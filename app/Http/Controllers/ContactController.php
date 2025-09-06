<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // ولیدیشن فرم
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        // ارسال ایمیل
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('wahidnajafi200@gmail.com') // ایمیل گیرنده
                ->subject($data['title'])
                ->from('wahidnajafi200@gmail.com', 'Aprial') // نام سایت
                ->replyTo($data['email'], $data['name']);    // ایمیل کاربر
        });

        // بازگشت به همان صفحه و anchor فرم
        return redirect()->back()->with('success', 'پیام شما با موفقیت ارسال شد ')->withFragment('contactForm');
    }
}
