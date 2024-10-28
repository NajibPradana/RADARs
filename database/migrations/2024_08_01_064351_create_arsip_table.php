<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipTable extends Migration
{
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id('arsip_id'); // Ini otomatis menjadi auto-increment
            $table->foreignId('lembaga_id')->constrained('lembaga', 'lembaga_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_klasifikasi');
            $table->string('nomor_identitas');
            $table->text('uraian_informasi');
            $table->date('kurun_waktu');
            $table->integer('jumlah');
            $table->string('jenis_arsip');
            $table->integer('retensi_aktif');
            $table->integer('retensi_inaktif');
            $table->string('kondisi_asli')->nullable();
            $table->string('kondisi_tekstual')->nullable();
            $table->string('kondisi_baik')->nullable();
            $table->text('keterangan_lain')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('arsips', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}