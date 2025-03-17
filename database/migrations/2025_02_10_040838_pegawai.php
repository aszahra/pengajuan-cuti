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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('nip')->primary();
            // $table->string('nip');
            $table->integer('id_user')->nullable();
            $table->string('nama');
            $table->string('id_jabatan');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('status_pegawai');
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
