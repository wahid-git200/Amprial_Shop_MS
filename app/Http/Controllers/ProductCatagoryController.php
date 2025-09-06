<?php

namespace App\Http\Controllers;

use App\Models\ProductCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductCatagoryController extends Controller
{
    public function index()
    {
        $categories = ProductCatagory::all();
        return view('admin.add', compact('categories'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'discription' => 'required|string|max:150'
        ]);

        if ($request->id) {
            // بروزرسانی
            $category = ProductCatagory::findOrFail($request->id);
            $category->name = $request->name;
            $category->discription = $request->discription;
            $category->save();

            return redirect()->back()->with('success', 'کتگوری با موفقیت بروزرسانی شد.');
        } else {
            // ایجاد رکورد جدید
            $category = ProductCatagory::create([
                'name' => $request->name,
                'discription' => $request->discription,
            ]);

            return redirect()->back()->with('success', 'کتگوری با موفقیت اضافه شد و فایل Blade ساخته شد.');
        }
    }

    public function show($id)
    {
        $category = ProductCatagory::with('products')->findOrFail($id);
        return view('admin.products.category_show', compact('category'));
    }

    public function showServices($categoryId)
    {
        $category_products = ProductCatagory::with('products')->findOrFail($categoryId);

        return view('products.items', compact('category_products'));
    }


    public function delete(Request $request)
    {
        $id = $request->query('id');
        $category = ProductCatagory::findOrFail($id);

        // حذف فایل Blade
        $safeId = str_replace('-', '_', $category->id);
        $filePath = resource_path("views/admin/products/testss/category_{$safeId}.blade.php");

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $category->delete();

        return back()->with('success', 'کتگوری با موفقیت حذف شد.');
    }
}
