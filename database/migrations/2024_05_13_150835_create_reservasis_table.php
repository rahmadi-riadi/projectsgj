<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('nama_instansi');
            $table->string('nomor_hp');
            $table->string('nomor_wa');
            $table->string('email')->unique();
            $table->string('provinsi');
            $table->string('alamat_instansi');
            $table->date('tanggal');
            $table->string('pukul');
            $table->text('topik');
            $table->string('tujuan_opd');
            $table->integer('jumlah_rombongan');
            $table->string('pimpinan');
            $table->text('keterangan');
            $table->string('nomor_surat');
            $table->string('kepada');
            $table->string('file_surat_permohonan');
            $table->boolean('is_bukti_inap')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
