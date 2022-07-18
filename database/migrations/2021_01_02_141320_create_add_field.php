<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddField extends Migration
{
    public function up()
    {
        Schema::table('tb_absensi', function (Blueprint $table) {
            $table->foreign('attendance_id')->references('id')->on('tb_attendance')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('tb_absensi', function (Blueprint $table) {
            //
        });
    }
}
