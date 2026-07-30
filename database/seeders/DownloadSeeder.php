<?php

namespace Database\Seeders;

use App\Models\Download;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar dummy dokumen yang merepresentasikan file APJII Pusat
        $documents = [
            [
                'title'     => 'Formulir Pendaftaran Anggota APJII (ISP)',
                'category'  => 'Keanggotaan',
                'extension' => 'pdf',
                'size'      => '1.5 MB',
                'file_path' => 'downloads/form-pendaftaran-anggota-isp.pdf',
            ],
            [
                'title'     => 'Salinan AD/ART APJII Hasil Munas',
                'category'  => 'Regulasi',
                'extension' => 'pdf',
                'size'      => '4.2 MB',
                'file_path' => 'downloads/salinan-ad-art-apjii.pdf',
            ],
            [
                'title'     => 'Formulir Permohonan Alokasi IP Address (NIR)',
                'category'  => 'Formulir',
                'extension' => 'docx',
                'size'      => '250 KB',
                'file_path' => 'downloads/form-permohonan-ip-address.docx',
            ],
            [
                'title'     => 'Panduan Teknis Interkoneksi IIX Nasional',
                'category'  => 'Panduan Teknis',
                'extension' => 'pdf',
                'size'      => '2.8 MB',
                'file_path' => 'downloads/panduan-teknis-iix.pdf',
            ],
            [
                'title'     => 'Laporan Survei Penetrasi Internet Indonesia',
                'category'  => 'Publikasi',
                'extension' => 'zip',
                'size'      => '8.5 MB',
                'file_path' => 'downloads/laporan-survei-internet.zip',
            ],
            [
                'title'     => 'Surat Kuasa Pengambilan Perangkat / Server di Data Center',
                'category'  => 'Formulir',
                'extension' => 'doc',
                'size'      => '120 KB',
                'file_path' => 'downloads/surat-kuasa-pengambilan-perangkat.doc',
            ]
        ];

        // Konten teks sederhana untuk mengisi file dummy agar bisa diunduh
        $dummyFileContent = "Ini adalah file dummy dokumen APJII hasil generate dari Seeder. File aslinya nanti bisa diunggah melalui panel Admin.";

        foreach ($documents as $doc) {
            // 1. Buat file fisiknya di storage/app/public/downloads
            Storage::disk('public')->put($doc['file_path'], $dummyFileContent);

            // 2. Masukkan datanya ke database
            Download::create($doc);
        }

        $this->command->info('Download dummy data (beserta file fisiknya) berhasil di-generate!');
    }
}