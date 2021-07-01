<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de', 70);
            $table->string('mo_ta', 255);
            $table->longText('noi_dung');
            $table->string('image', 255);
            $table->tinyInteger('trang_thai')->default(0);
            $table->tinyInteger('noi_bat')->default(0);
            $table->date('ngay_post');
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
        Schema::dropIfExists('posts');
    }
}
