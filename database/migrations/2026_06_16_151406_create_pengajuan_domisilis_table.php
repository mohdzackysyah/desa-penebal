<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_domisilis', function (Blueprint $table) {
            $table->id();
            
            // KOLOM BARU: Kode unik untuk pelacakan warga
            $table->string('kode_resi')->unique(); 
            
            $table->string('nik', 16);
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            
            // Kolom untuk menyimpan nama file gambar
            $table->string('foto_ktp');
            $table->string('foto_kk');
            
            // Status pengajuan: menunggu, diverifikasi, ditolak, selesai
            $table->string('status')->default('menunggu'); 
            
            // Catatan admin jika ada yang salah/kurang
            $table->text('catatan_admin')->nullable(); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_domisilis');
    }
};