<?php

namespace App\Http\Requests\Admin\Store;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => 'required|string|max:255',          // 店舗名は必須、文字列、最大255文字
            'zip1' => 'required|string|max:10',            // 郵便番号1は必須、文字列、最大10文字
            'zip2' => 'required|string|max:10',            // 郵便番号2は必須、文字列、最大10文字
            'address' => 'required|string|max:255',        // 住所は必須、文字列、最大255文字
            'build' => 'nullable|string|max:255',          // 建物は任意、文字列、最大255文字
            'contents' => 'nullable|string|max:500',       // 備考は任意、文字列、最大500文字
            'url' => 'nullable|url',                        // ホームページURLは任意、URL形式
            'image' => 'nullable|image|max:2048',           // 画像は任意、画像ファイル、最大2MB
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名は必須です。',
            'name.string' => '店舗名は文字列で入力してください。',
            'name.max' => '店舗名は255文字以内で入力してください。',

            'zip1.required' => '郵便番号1は必須です。',
            'zip1.string' => '郵便番号1は文字列で入力してください。',
            'zip1.max' => '郵便番号1は10文字以内で入力してください。',

            'zip2.required' => '郵便番号2は必須です。',
            'zip2.string' => '郵便番号2は文字列で入力してください。',
            'zip2.max' => '郵便番号2は10文字以内で入力してください。',

            'address.required' => '住所は必須です。',
            'address.string' => '住所は文字列で入力してください。',
            'address.max' => '住所は255文字以内で入力してください。',

            'build.string' => '建物名は文字列で入力してください。',
            'build.max' => '建物名は255文字以内で入力してください。',

            'contents.string' => '備考は文字列で入力してください。',
            'contents.max' => '備考は500文字以内で入力してください。',

            'url.url' => '正しいURLを入力してください。',

            'image.image' => '画像ファイルを選択してください。',
            'image.max' => '画像のサイズは2MB以内にしてください。',
        ];
    }
}


