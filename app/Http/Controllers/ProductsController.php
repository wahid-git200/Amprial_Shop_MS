<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|string|max:30',
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:3072',
            'attributes' => 'nullable|array',
            'attributes.*.name' => 'required|string|max:255',
            'attributes.*.value' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            // 1) Upload images
            $uploadedPaths = [];
            $currentTime = now()->format('Y-m-d_H-i-s');
            $destinationPath = public_path('uploads/products_img');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            foreach ($request->file('images') as $index => $image) {
                $extension = $image->getClientOriginalExtension();
                $fileName = "{$currentTime}-" . ($index + 1) . ".{$extension}";
                $image->move($destinationPath, $fileName);
                $uploadedPaths[] = "uploads/products_img/" . $fileName;
            }

            // 2) Save product
            $product = Products::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'images' => json_encode($uploadedPaths),
                'description' => $request->description ?? null,
            ]);

            // 3) Save attributes with unique id
            $attributes = $request->input('attributes', []);
            foreach ($attributes as $attr) {
                if (!empty($attr['name']) && !empty($attr['value'])) {
                    $product->attributes()->create([
                        // اگر مدل ProductAttribute اتوماتیک id تولید می‌کند، نیاز به مقداردهی نیست
                        'name' => $attr['name'],
                        'value' => $attr['value'],
                    ]);
                }
            }
        });

        return redirect()->back()->with('success', 'محصول با موفقیت ثبت شد!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable|string',
        ]);

        $product = Products::findOrFail($id);

        // حذف تصاویر قبلی اگر تصویر جدید آپلود شد
        if ($request->hasFile('images')) {
            if ($product->images) {
                $oldImages = json_decode($product->images, true);
                foreach ($oldImages as $img) {
                    if (file_exists(public_path($img))) {
                        unlink(public_path($img));
                    }
                }
            }

            $uploadedPaths = [];
            $currentTime = now()->format('Y-m-d_H-i-s');
            $destinationPath = public_path('uploads/products_img');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            foreach ($request->file('images') as $index => $image) {
                $extension = $image->getClientOriginalExtension();
                $fileName = "{$currentTime}-" . ($index + 1) . ".{$extension}";
                $image->move($destinationPath, $fileName);
                $uploadedPaths[] = "uploads/products_img/" . $fileName;
            }
            $product->images = json_encode($uploadedPaths);
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();

        // بروزرسانی ویژگی‌ها
        $attributes = $request->input('attributes', []);
        foreach ($attributes as $attr) {
            if (!empty($attr['name']) && !empty($attr['value'])) {
                $product->attributes()->create([
                    // اگر مدل ProductAttribute اتوماتیک id تولید می‌کند، نیاز به مقداردهی نیست
                    'name' => $attr['name'],
                    'value' => $attr['value'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'محصول با موفقیت بروزرسانی شد.');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        // حذف تصاویر محصول
        if ($product->images) {
            $images = json_decode($product->images, true);
            foreach ($images as $image) {
                $path = public_path($image);
                if (file_exists($path)) unlink($path);
            }
        }

        $product->delete();

        return response()->json(['success' => 'محصول با موفقیت حذف شد.']);
    }

    public function show($id)
    {
        // گرفتن محصول به همراه ویژگی‌ها
        $product = Products::with('attributes')->findOrFail($id);

        return view('products.item_detail', compact('product'));
    }
}
