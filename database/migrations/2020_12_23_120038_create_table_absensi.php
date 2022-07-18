<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAbsensi extends Migration
{
    public function up()
    {
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id')->unsigned();
            $table->integer('attendance_id')->unsigned();
            $table->integer('bulan_ke');
            $table->integer('jumlah_lembur');
            $table->string('code');
            $table->string('periode');
            $table->enum('status', ['Staff','Daily Worker']);
            $table->date('tanggal_absen');
            $table->time('waktu_masuk');
            $table->time('waktu_keluar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_absensi');
    }
}
