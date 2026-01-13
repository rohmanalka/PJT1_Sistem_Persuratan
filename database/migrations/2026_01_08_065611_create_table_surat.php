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
            $table->UnsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jenis_surat');
            $table->string('nomor_surat')->unique();
            $table->string('judul');
            $table->text('isi');
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('pending');
            $table->date('tanggal_surat');
            $table->text('catatan')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete();
            $table->foreign('id_jenis_surat')->references('id_jenis_surat')->on('jenis_surat');
            $table->foreign('approved_by')->references('id_user')->on('users')->nullOnDelete();
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
