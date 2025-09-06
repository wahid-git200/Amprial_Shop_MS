<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    // نمایش فرم ورود
    public function showLoginForm()
    {
        return view('pages.login');
    }

    // پردازش ورود کاربر
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'ایمیل یا رمز عبور اشتباه است',
        ])->onlyInput('email');
    }

    // نمایش فرم ثبت‌نام
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // پردازش ثبت‌نام
    public function register(Request $request)
    {
        // $data = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users',
        //     'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);

        // ذخیره تصویر اگر وجود داشته باشد
        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('users', 'public');
        // }

        // ایجاد کاربر
        User::create([
            'name' => 'Wahid',
            'email' => 'wahid@gmail.com',
            'image' => 'sfs',
            'password' => Hash::make('12345'), // رمزنگاری رمز عبور
        ]);

        return back()->with('success', 'ثبت‌نام موفقیت‌آمیز بود. لطفاً وارد شوید.');
    }

    // خروج از سیستم
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('pages.home'));
    }
}
