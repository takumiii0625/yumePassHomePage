<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // バリデーションルールを適用
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // メール送信処理（例：Mailクラスを使用）
        Mail::to('your-email@example.com')->send(new ContactFormMail($validated));

        // バリデーションが通れば後続の処理へ
        // 例：データベースへの保存やメール送信など

        // 処理後、適切なリダイレクトやメッセージ表示
        return redirect('/')->with('success', 'お問い合わせありがとうございます！');
    }
}