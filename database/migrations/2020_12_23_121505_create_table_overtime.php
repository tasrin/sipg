<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOvertime extends Migration
{
    public function up()
    {
        Schema::create('tb_overtime', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('staff_id');
            $table->double('jumlah_overtime')->default(0);
            $table->date('tgl_overtime');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('tb_staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_overtime');
    }
}
