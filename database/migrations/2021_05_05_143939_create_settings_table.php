<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 255);
            $table->string('ten_cong_ty', 255);
            $table->longText('image', 255);
            $table->string('phone', 15);
            $table->string('hotline', 15);
            $table->string('link_face');
            $table->date('ngay_tao');
            $table->integer('id_account')->unsigned();
            $table->foreign('id_account')->references('id')->on('accounts');
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
        Schema::dropIfExists('settings');
    }
}
