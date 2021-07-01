<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('size');
            $table->string('don_vi_tinh');
            $table->decimal('tong_tien', 15, 4);
            $table->decimal('gia_ban', 15, 4);
            $table->decimal('giam_gia', 15, 4);
            $table->tinyInteger('trang_thai')->default(0);
            $table->integer('so_luong');
            $table->integer('bill_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('bill_details');
    }
}
