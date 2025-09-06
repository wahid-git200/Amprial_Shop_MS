<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'price'      => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($validated) {
            // پیدا کردن محصول
            $product = Products::with('attributes')->lockForUpdate()->findOrFail($validated['product_id']);

            // بررسی موجودی
            if ($validated['quantity'] > $product->stock) {
                return back()->withErrors([
                    'quantity' => 'تعداد فروش بیشتر از موجودی محصول است.'
                ])->withInput();
            }

            // گرفتن همه ویژگی‌های محصول از جدول product_attributes
            $properties = $product->attributes
                ->mapWithKeys(fn($attr) => [$attr->name => $attr->value])
                ->toArray();

            // آماده‌سازی داده فروش
            $data = [
                'product_name'     => $product->name,
                'product_category' => optional($product->category)->name ?? '',
                'quantity'         => $validated['quantity'],
                'price'            => $validated['price'],
                'total_price'      => $validated['quantity'] * $validated['price'],
                'properties'       => $properties,
                'sold_at'          => now(),
            ];

            // ======= Handle first product image =======
            if ($product->images) {
                $images = json_decode($product->images, true);
                if (!empty($images)) {
                    $firstImage = $images[0]; // take first image
                    $filename = time() . '_' . basename($firstImage);
                    $destination = public_path('uploads/sell_img/' . $filename);

                    if (!file_exists(public_path('uploads/sell_img'))) {
                        mkdir(public_path('uploads/sell_img'), 0755, true);
                    }

                    if (file_exists(public_path($firstImage))) {
                        copy(public_path($firstImage), $destination);
                    }

                    $imagePath = 'uploads/sell_img/' . $filename;
                    $data['image'] = $imagePath; // just store string
                }
            }
            // ==========================================

            // ذخیره فروش
            Sales::create($data);

            // کم کردن موجودی
            $product->decrement('stock', $validated['quantity']);

            return back()->with('success', 'فروش با موفقیت ثبت شد.');
        });
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name'     => 'required|string|max:255',
            'product_category' => 'nullable|string|max:255',
            'quantity'         => 'required|integer|min:1',
            'price'            => 'required|numeric|min:0',
        ]);

        $sale = Sales::findOrFail($id);

        $sale->update([
            'product_name'     => $validated['product_name'],
            'product_category' => $validated['product_category'],
            'quantity'         => $validated['quantity'],
            'price'            => $validated['price'],
            'total_price'      => $validated['quantity'] * $validated['price'], // اتوماتیک
        ]);

        return back()->with('success', 'فروش با موفقیت بروزرسانی شد.');
    }

    public function destroy($id)
    {
        $sale = Sales::findOrFail($id);

        // اگر عکس داشته باشد، حذف شود
        if ($sale->image && file_exists(public_path($sale->image))) {
            unlink(public_path($sale->image));
        }

        $sale->delete();

        return redirect()->back()->with('success', 'فروش با موفقیت حذف شد.');
    }
}
