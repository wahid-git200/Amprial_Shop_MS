<?php

namespace App\Http\Controllers;

use App\Models\Withdrawals;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1',
            'description' => 'required|string'
        ]);

        Withdrawals::create(
            [
                'amount' => $request->amount,
                'description' => $request->description
            ]
        );

        return back()->with('success', 'برداشتی با موفقیت ثبت شد');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $withdrawal = Withdrawals::findOrFail($id);
        $withdrawal->update([
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'برداشت با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $Withdrawal = Withdrawals::findOrFail($id);
        $Withdrawal->delete();
        return redirect()->back()->with('success', 'برداشتی با موفقیت حذف شد');
    }
}
