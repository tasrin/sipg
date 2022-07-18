<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStaff extends Migration
{
    public function up()
    {
        Schema::create('tb_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('departement_id');
            $table->unsignedInteger('users_id')->nullable();
            $table->string('name');
            $table->date('birth');
            $table->text('addres')->nullable();
            $table->date('startdate');
            $table->text('phone');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('position_id')->references('id')->on('tb_position')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('departement_id')->references('id')->on('tb_departement')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_staff');
    }
}
