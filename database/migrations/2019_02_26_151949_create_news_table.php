<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('標題');
            $table->integer('type')->comment('類別');
            $table->integer('status')->comment('狀態');
            $table->integer('start_time')->comment('上架時間');
            $table->integer('end_time')->comment('下架時間');
            $table->text('content')->comment('內容');
            $table->text('file')->nullable()->comment('附加檔案');
            $table->integer('top')->default(0)->comment('置頂');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
