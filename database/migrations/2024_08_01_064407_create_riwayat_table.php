<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id('riwayat_id');
            $table->foreignId('arsip_id')->constrained('arsips', 'arsip_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('aksi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
}

