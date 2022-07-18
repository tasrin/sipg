<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSalary extends Migration
{
    public function up()
    {
        Schema::create('tb_salary', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('staff_id');
            $table->double('salary')->default(0);
            $table->double('uang_overtime')->default(0);
            $table->double('pot_bpjs')->default(0);
            $table->date('tgl_salary');
            $table->string('periode')->nullable();
            $table->string('transportasi')->nullable();
            $table->double('total')->nullable()->default(0);
            $table->string('status_gaji')->nullable();
            $table->string('status')->nullable();
            $table->string('jumlah_overtime')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('staff_id')->references('id')->on('tb_staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_salary');
    }
}
