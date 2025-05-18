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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('status');
            // $table->string('nama');
            // $table->string('telepon');
            $table->string('agama');
            $table->string('jenis_kelamin');
            // $table->string('alamat');
            $table->string('nik');
            $table->string('tgl_masuk');
            $table->string('pendidikan_terakhir');
            $table->string('jabatan');
            $table->decimal('gaji_pokok', 15, 2)->nullable();
            // $table->string('divisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
