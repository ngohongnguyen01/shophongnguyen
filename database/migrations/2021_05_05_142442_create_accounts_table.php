<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('ho_ten');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('phone',10);
            $table->string('dia_chi',255);
            $table->string('image',255);
            $table->tinyInteger('trang_thai');
            $table->string('phan_quyen');
            $table->date('ngay_tao');
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
        Schema::dropIfExists('accounts');
    }
}
