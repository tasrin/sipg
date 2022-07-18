<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCuti extends Migration
{
    public function up()
    {
        Schema::create('tb_cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('staff_id');
            $table->integer('jumlah_cuti');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->text('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('tb_staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_cuti');
    }
}
