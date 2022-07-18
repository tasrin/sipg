<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSchedule extends Migration
{
    public function up()
    {
        Schema::create('tb_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('staff_id');
            $table->date('tgl_masuk');
            $table->enum('ket_schedule', ['Morning(05:00-14:00)','Afternoon(13:00-22:00)','Middle Morning(10:00-19:00)','Middle Afternoon(12:00-21:00)','Evening (19:00-04:00)','Mignight (22:00-07:00)']);
            $table->enum('status', ['Staff','Daily Worker']);
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('tb_staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_schedule');
    }
}
