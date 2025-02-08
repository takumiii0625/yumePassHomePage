<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // リクエストが許可されているかどうかをチェック
    public function authorize()
    {
        // 基本的に true を返すことで、このリクエストを許可
        return true;
    }

    // バリデーションルールを記述
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',         // 店舗名は必須、文字列、最大255文字
            'description' => 'required|string|max:500',  // 店舗の詳細は必須、文字列、最大500文字
            'location' => 'required|string|max:255',     // 店舗の住所は必須、文字列、最大255文字
        ];
    }
}

