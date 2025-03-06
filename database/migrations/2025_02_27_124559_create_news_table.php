<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // お知らせタイトル
            $table->text('content'); // お知らせ内容
            $table->dateTime('published_at')->nullable(); // 公開日時
            $table->tinyInteger('delete_flg')->default(0); // 削除フラグ（0:未削除, 1:削除済み）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
