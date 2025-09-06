<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchasesController extends Controller
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

            // گرفتن همه ویژگی‌های محصول از جدول product_attributes
            $properties = $product->attributes
                ->mapWithKeys(fn($attr) => [$attr->name => $attr->value])
                ->toArray();

            // آماده‌سازی داده خرید
            $data = [
                'product_name'     => $product->name,
                'product_category' => optional($product->category)->name ?? '',
                'quantity'         => $validated['quantity'],
                'price'            => $validated['price'],
                'total_price'      => $validated['quantity'] * $validated['price'],
                'properties'       => $properties,
                'purchased_at'     => now(), // بهتر است برای خرید از purchased_at استفاده شود
            ];

            // ======= Handle first product image =======
            if ($product->images) {
                $images = json_decode($product->images, true);
                if (!empty($images)) {
                    $firstImage = $images[0]; // take first image
                    $filename = time() . '_' . basename($firstImage);
                    $destination = public_path('uploads/bay_image/' . $filename);

                    if (!file_exists(public_path('uploads/bay_image'))) {
                        mkdir(public_path('uploads/bay_image'), 0755, true);
                    }

                    if (file_exists(public_path($firstImage))) {
                        copy(public_path($firstImage), $destination);
                    }

                    $imagePath = 'uploads/bay_image/' . $filename;
                    $data['image'] = $imagePath; // just store string
                }
            }
            // ==========================================

            // ذخیره خرید
            Purchases::create($data);

            // افزایش موجودی (چون خرید می‌کنیم)
            $product->increment('stock', $validated['quantity']);

            return back()->with('success', 'خرید با موفقیت ثبت شد.');
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

        $purchase = Purchases::findOrFail($id);

        $purchase->update([
            'product_name'     => $validated['product_name'],
            'product_category' => $validated['product_category'],
            'quantity'         => $validated['quantity'],
            'price'            => $validated['price'],
            'total_price'      => $validated['quantity'] * $validated['price'], // اتوماتیک
        ]);

        return back()->with('success', 'خرید با موفقیت بروزرسانی شد.');
    }


    public function destroy($id)
    {
        $purchase = Purchases::findOrFail($id);

        // اگر عکس داشته باشد، حذف شود
        if ($purchase->image && file_exists(public_path($purchase->image))) {
            unlink(public_path($purchase->image));
        }

        $purchase->delete();

        return redirect()->back()->with('success', 'خرید با موفقیت حذف شد.');
    }
}
