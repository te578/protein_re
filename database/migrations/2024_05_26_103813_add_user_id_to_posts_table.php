<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('posts', function (Blueprint $table) {
             $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
             $table->dropForeign(['user_id']); // 外部キー制約を削除
            $table->dropColumn('user_id'); // user_idカラムを削除
        //いつ使うかわからないけど一応書いておく
        });
    }
};
