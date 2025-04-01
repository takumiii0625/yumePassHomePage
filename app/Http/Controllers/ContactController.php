<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSendmail;
use App\Mail\ContactUserSendmail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactFormRequest $request)
    {
        $contact = $request->all();
        return view('contact.confirm',compact('contact'));
    }

    public function send(ContactFormRequest $request)
    {
        // フォームから送られてきたデータをすべて取得
        $contact = $request->all();

        // ユーザーに確認メールを送る
        Mail::to($contact['email'])->send(new ContactUserSendmail($contact));

        // 管理者に通知メールを送る
        Mail::to('store-pass@obfall.co.jp')->send(new ContactSendmail($contact));

        // セッションのトークンを再生成（2重送信防止）
        $request->session()->regenerateToken();

        // 送信完了ページを表示
        return view('contact.thanks');
    }

}
