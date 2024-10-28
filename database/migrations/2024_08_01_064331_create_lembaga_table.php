<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembagaTable extends Migration
{
    public function up()
    {
        Schema::create('lembaga', function (Blueprint $table) {
            $table->id('lembaga_id');
            $table->string('nama_lembaga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lembaga');
    }
}

