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
        Schenma::create('likes', function (Blueprint $table){
         
         $table->id();
         $table->foreignId('user_id')->constrained()->onDelete('cascade');
         $table->foreignId('post_id')->constrained()->onDelete('cascade');
            //一意制約、複数言い値をいいねをつけられないようにする
         $table->unique(['user_id','post_id']);
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};