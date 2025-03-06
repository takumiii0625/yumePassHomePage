<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    // リクエストが許可されているかをチェック
    public function authorize()
    {
        return true; // true でリクエストを許可
    }

    // バリデーションルールを記述
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',          // タイトルは必須、文字列、最大255文字
            'content' => 'required|string|max:2000',       // 内容は必須、文字列、最大2000文字
            'published_at' => 'nullable|date',             // 公開日は任意、日付形式
        ];
    }

    // カスタムメッセージ
    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.string' => 'タイトルは文字列で入力してください。',
            'title.max' => 'タイトルは255文字以内で入力してください。',

            'content.required' => '内容は必須です。',
            'content.string' => '内容は文字列で入力してください。',
            'content.max' => '内容は2000文字以内で入力してください。',

            'published_at.date' => '公開日は正しい日付形式で入力してください。',
        ];
    }
}
