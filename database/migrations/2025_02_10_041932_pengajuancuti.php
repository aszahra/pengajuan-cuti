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
        Schema::create('pengajuancuti', function (Blueprint $table) {
            $table->id();
            $table->string('id_pegawai');
            $table->date('tanggal_pengajuan')->nullable();
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->string('id_cuti');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('jumlah');
            // $table->integer('sisa_cuti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
