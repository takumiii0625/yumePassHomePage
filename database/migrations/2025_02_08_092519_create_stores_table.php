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
        Schema::create('stores', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->string('name'); // 店舗名
            $table->string('zip1')->nullable();        // 郵便番号1
            $table->string('zip2')->nullable();        // 郵便番号2
            $table->string('address')->nullable();     // 住所
            $table->string('build')->nullable();       // 建物
            $table->text('contents')->nullable();      // 備考
            $table->string('url')->nullable();         // ホームページのURL
            $table->string('image')->nullable();       // 画像
            $table->tinyInteger('delete_flg')->default(0); // 削除フラグ
            $table->timestamp('created_at')->nullable(); // 作成日時
            $table->timestamp('updated_at')->nullable(); // 更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
