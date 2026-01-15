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
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->unsignedBigInteger('id_tujuan')->nullable();
            $table->UnsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jenis_surat')->nullable();
            $table->string('nomor_surat')->unique();
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('pending');
            $table->date('tanggal_surat')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('prioritas', ['biasa', 'penting', 'segera'])->default('biasa');
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete();
            $table->foreign('id_jenis_surat')->references('id_jenis_surat')->on('jenis_surat');
            $table->foreign('approved_by')->references('id_user')->on('users')->nullOnDelete();
            $table->foreign('id_tujuan')->references('id_user')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
