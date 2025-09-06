<?php

namespace App\Http\Controllers;

use App\Models\ProductCatagory;
use App\Models\Sales;
use App\Models\Purchases;
use App\Models\Withdrawals;
use Morilog\Jalali\Jalalian;

class DashboardController extends Controller
{
    public function index()
    {
        // --- محدوده ماه جاری (Jalali) ---
        $nowShamsi = Jalalian::now();
        $startShamsi = new Jalalian($nowShamsi->getYear(), $nowShamsi->getMonth(), 1);
        $endShamsi = $startShamsi->addMonths(1)->subDays(1);

        $startGregorian = $startShamsi->toCarbon();
        $endGregorian   = $endShamsi->toCarbon();

        // --- فروش‌ها در این ماه ---
        $sells = Sales::whereBetween('created_at', [$startGregorian, $endGregorian])->get();
        $number_of_sells_in_this_month = $sells->count();

        // --- خریدها در این ماه ---
        $buys = Purchases::whereBetween('created_at', [$startGregorian, $endGregorian])->get();
        $number_of_buys_in_this_month = $buys->count();

        // --- دسته‌بندی‌ها و تعداد محصولات هر کدام ---
        $categories = ProductCatagory::withCount('products')->get();

        $withdrawals = Withdrawals::whereBetween('created_at', [$startGregorian, $endGregorian])->get();
        $total_withdrawal =  $withdrawals->sum('amount');
        // هر دسته:
        // $category->name
        // $category->products_count

        return view('admin.dashboard', compact(
            'sells',
            'buys',
            'number_of_sells_in_this_month',
            'number_of_buys_in_this_month',
            'categories',
            'withdrawals',
            'total_withdrawal',
        ));
    }
}
