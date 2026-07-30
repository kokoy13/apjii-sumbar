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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul dokumen
            $table->string('category')->nullable(); // Kategori (misal: Keanggotaan, Regulasi)
            $table->string('extension', 10); // Ekstensi file (misal: pdf, docx, zip)
            $table->string('size', 20)->nullable(); // Ukuran file (misal: 1.2 MB)
            $table->string('file_path'); // Path atau lokasi file disimpan di storage
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};