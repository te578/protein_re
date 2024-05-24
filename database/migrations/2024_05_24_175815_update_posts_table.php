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
             // カラム名の修正
            $table->renameColumn('boby', 'body');

            // 新しいカラムの追加
            $table->decimal('carbohydrates', 8, 2)->nullable();
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
            // カラム名を元に戻す
            $table->renameColumn('body', 'boby');

            // 新しいカラムの削除
            $table->dropColumn('carbohydrates');
        });
    }
};
