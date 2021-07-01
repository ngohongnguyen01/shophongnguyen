<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->date('ngay_nhap');
            $table->string('slug',255);
            $table->string('mo_ta',255);
            $table->longText('mo_ta_chi_tiet',4000);
            $table->string('image',255);
            $table->integer('tong_so_luong');
            $table->integer('gia_nhap');
            $table->integer('gia_ban');
            $table->integer('giam_gia');
            $table->char('don_vi_tinh');
            $table->integer('luot_xem');
            $table->tinyInteger('trang_thai')->default(0);
            $table->tinyInteger('noi_bat')->default(0);
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
