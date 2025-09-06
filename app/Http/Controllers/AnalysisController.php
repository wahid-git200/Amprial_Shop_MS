<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use App\Models\Purchases;
use App\Models\sales;
use App\Models\Withdrawals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class AnalysisController extends Controller
{
    public function index()
    {


        // گرفتن همه تاریخ‌ها از products
        // $dates = DB::table('products')->pluck('created_at');


        $dates = [];
        array_push($dates, DB::table('products')->pluck('created_at'));
        array_push($dates, DB::table('Purchases')->pluck('created_at'));
        array_push($dates, DB::table('sales')->pluck('created_at'));
        array_push($dates, DB::table('Withdrawals')->pluck('created_at'));

        // dd($dates);

        // $dates += DB::table('Withdrawals')->pluck('created_at');

        // استخراج سال‌ها و ماه‌های مربوطه (هجری شمسی)
        $years = [];
        $yearMonths = [];

        foreach ($dates as $date) {
            foreach ($date as $dt) {
                $jDate = Jalalian::fromDateTime($dt);
                $year = $jDate->getYear();
                $month = $jDate->getMonth();

                $years[$year] = $year;
                $yearMonths[$year][] = $month;
            }
        }

        // یکتا سازی ماه‌ها
        foreach ($yearMonths as $y => $months) {
            $yearMonths[$y] = collect($months)->unique()->sort()->values()->all();
        }

        // سال و ماه فعلی
        $now = Jalalian::now();
        $currentYear = $now->getYear();
        $currentMonth = $now->getMonth();

        return view('admin.analays', [
            'years' => $years,
            'yearMonths' => $yearMonths,
            'currentYear' => $currentYear,
            'currentMonth' => $currentMonth,
        ]);
    }

    public function filter(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $products = DB::table('products')->get()->filter(function ($item) use ($year, $month) {
            $jDate = Jalalian::fromDateTime($item->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        });

        return response()->json($products);
    }

    public function filterFinance(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Sales
        $sells = DB::table('sales')->get()->filter(function ($item) use ($year, $month) {
            $jDate = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        })->map(function ($item) {
            // فقط یک تصویر داریم، مستقیم استفاده می‌کنیم
            $item->properties = $item->properties ? json_decode($item->properties, true) : [];
            $item->jalali_date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format('Y/m/d');
            return $item;
        })->values();

        // Purchases
        $buys = DB::table('purchases')->get()->filter(function ($item) use ($year, $month) {
            $jDate = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        })->map(function ($item) {
            // تصویر مستقیم استفاده می‌شود، JSON نیست
            $item->properties = $item->properties ? json_decode($item->properties, true) : [];
            $item->jalali_date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format('Y/m/d');
            return $item;
        })->values();



        $products = DB::table('products')->get()->filter(function ($product) use ($year, $month) {
            $jDate = Jalalian::fromDateTime($product->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        });
        $totalStock = $products->sum('stock');

        // Sales
        $sales = DB::table('sales')->get()->filter(function ($sale) use ($year, $month) {
            $jDate = Jalalian::fromDateTime($sale->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        });
        $totalSalesQty = $sales->sum('quantity');
        $totalSalesPrice = $sales->sum('total_price');

        // Purchases
        $purchases = DB::table('purchases')->get()->filter(function ($purchase) use ($year, $month) {
            $jDate = Jalalian::fromDateTime($purchase->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        });
        $totalPurchasesQty = $purchases->sum('quantity');
        $totalPurchasesPrice = $purchases->sum('total_price');

        // Withdrawals
        $withdrawals = DB::table('withdrawals')->get()->filter(function ($withdrawal) use ($year, $month) {
            $jDate = Jalalian::fromDateTime($withdrawal->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        });
        $totalWithdrawals = $withdrawals->sum('amount');


        // Withdrawals   
        $withdrawals = DB::table('withdrawals')->get()->filter(function ($item) use ($year, $month) {
            $jDate = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at);
            return $jDate->getYear() == $year && $jDate->getMonth() == $month;
        })->map(function ($item) {
            $item->jalali_date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format('Y/m/d');
            return $item;
        })->values();

        return response()->json([
            'sells' => $sells,
            'buys' => $buys,
            'withdrawals' => $withdrawals,

            'totalStock' => $totalStock,
            'totalSalesQty' => $totalSalesQty,
            'totalSalesPrice' => $totalSalesPrice,
            'totalPurchasesQty' => $totalPurchasesQty,
            'totalPurchasesPrice' => $totalPurchasesPrice,
            'totalWithdrawals' => $totalWithdrawals,
        ]);
    }
}
