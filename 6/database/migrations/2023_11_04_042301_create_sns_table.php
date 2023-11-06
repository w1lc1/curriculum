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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // 自動採番 ID
            $table->bigInteger('user_id')->nullable();  // つぶやいたユーザーのID
            $table->text('body')->nullable();  // つぶやき本文 (TEXT型を使用)
            $table->timestamps();  // 作成日と更新日を自動的に追加
            $table->softDeletes();  // ソフトデリート用のカラムを追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
