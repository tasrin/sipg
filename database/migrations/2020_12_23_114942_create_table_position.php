<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePosition extends Migration
{
    public function up()
    {
        Schema::create('tb_position', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('status', ['Staff', 'Daily Worker']);
            $table->double('salary')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_position');
    }
}
