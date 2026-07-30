<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User Scaffolding
        User::factory()->create([
            'name' => 'Admin APJII Sumbar',
            'email' => 'admin@apjii.or.id',
            'password' => bcrypt('password'),
        ]);

        // 2. Realistic Categories
        $categoriesData = [
            ['name' => 'Berita Utama', 'slug' => 'berita-utama'],
            ['name' => 'Kegiatan & Raker wilayah', 'slug' => 'kegiatan-raker-wilayah'],
            ['name' => 'Pengumuman Resmi', 'slug' => 'pengumuman-resmi'],
            ['name' => 'Edukasi & Regulasi', 'slug' => 'edukasi-regulasi'],
        ];

        $categories = [];
        foreach ($categoriesData as $catData) {
            $categories[] = Category::create($catData);
        }

        // 3. Realistic News Posts (Indonesian Content for APJII Sumbar)
        $postsData = [
            [
                'category_id' => $categories[0]->id, // Berita Utama
                'title' => 'APJII Wilayah Sumatera Barat Resmi Buka Rapat Kerja Wilayah (Rakerwil) 2026 di Padang',
                'slug' => 'apjii-sumbar-resmi-buka-rakerwil-2026-di-padang',
                'excerpt' => 'Rakerwil APJII Sumatera Barat 2026 mengusung tema penguatan kedaulatan digital dan perluasan penetrasi internet berkualitas hingga pulau terluar.',
                'body' => '<p><strong>PADANG, APJII SUMBAR</strong> — Asosiasi Penyelenggara Jasa Internet Indonesia (APJII) Pengurus Wilayah Sumatera Barat menggelar Rapat Kerja Wilayah (Rakerwil) tahun 2026 bertempat di Grand Zuri Hotel, Padang.</p><p>Acara ini dihadiri oleh puluhan anggota penyelenggara jasa internet (ISP) se-Sumatera Barat, perwakilan Dinas Kominfo Provinsi Sumatera Barat, serta pemangku kepentingan industri telekomunikasi daerah.</p><p>Ketua Pengurus Wilayah APJII Sumbar menekankan pentingnya sinergi antar-provider lokal untuk memperkuat node jaringan Indonesia Internet Exchange (IIX) Padang demi menjamin latensi rendah serta efisiensi beban bandwidth internasional.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(1),
            ],
            [
                'category_id' => $categories[2]->id, // Infrastruktur & IIX
                'title' => 'Peningkatan Kapasitas Server IIX Padang capai 100 Gbps untuk Akses Internet Sumatera Barat',
                'slug' => 'peningkatan-kapasitas-server-iix-padang-100-gbps',
                'excerpt' => 'Node Indonesia Internet Exchange (IIX) Padang kini telah melayani trafik lokal dengan bandwidth mencapai 100 Gbps.',
                'body' => '<p>Pengurus Wilayah APJII Sumatera Barat berhasil menyelesaikan upgrade infrastruktur utama pada simpul <strong>Indonesia Internet Exchange (IIX) Padang</strong>.</p><p>Langkah strategis ini diambil guna mengantisipasi lonjakan trafik internet lokal dan meningkatkan keandalan pertukaran data antar-penyelenggara jasa internet lokal di Sumatera Barat.</p><p>Dengan upgrade ini, komunikasi data antar instansi, sekolah, dan bisnis lokal di Sumbar kini tidak perlu lagi melintasi hub Jakarta, mempercepat kecepatan respon layanan secara signifikan.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'category_id' => $categories[1]->id, // Kegiatan & Raker wilayah
                'title' => 'Pelatihan Cybersecurity & Network Routing BGP untuk Anggota APJII Sumatera Barat',
                'slug' => 'pelatihan-cybersecurity-bgp-anggota-apjii-sumbar',
                'excerpt' => 'APJII Sumbar menggelar workshop teknis pengamanan rute BGP (RPKI) dan mitigasi serangan DDoS bagi para Network Engineer lokal.',
                'body' => '<p>Guna meningkatkan keandalan dan keamanan ekosistem internet di wilayah Sumatera Barat, APJII Sumbar menyelenggarakan workshop teknis bertajuk <em>"Implementing RPKI and BGP Route Security"</em>.</p><p>Pelatihan ini diikuti oleh lebih dari 40 praktisi jaringan dan engineer dari berbagai Anggota APJII di Padang, Bukittinggi, Payakumbuh, dan Solok.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'category_id' => $categories[3]->id, // Pengumuman Resmi
                'title' => 'Himbauan Pemeliharaan Rutin Node Switch IIX Padang pada Akhir Pekan Ini',
                'slug' => 'himbauan-pemeliharaan-rutin-node-switch-iix-padang',
                'excerpt' => 'APJII Sumbar mengumumkan pemeliharaan jaringan terjadwal pada node IIX Padang demi menjaga stabilitas performa server.',
                'body' => '<p>Diberitahukan kepada seluruh Anggota APJII Wilayah Sumatera Barat bahwa akan dilakukan pemeliharaan sistem rutin (maintenance window) pada core switch IIX Padang.</p><p>Pemeliharaan akan berlangsung pada hari Sabtu pukul 01.00 WIB hingga 04.00 WIB. Selama jendela pemeliharaan, trafik internet lokal akan dialihkan secara otomatis ke jalur rute cadangan.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'category_id' => $categories[4]->id, // Edukasi & Regulasi
                'title' => 'APJII Sumbar Sosialisasi Survei Penetrasi Internet Indonesia 2026 di Perguruan Tinggi',
                'slug' => 'apjii-sumbar-sosialisasi-survei-penetrasi-internet-2026',
                'excerpt' => 'Hasil survei penetrasi internet nasional menjadi rujukan utama bagi perumusan kebijakan pembangunan infrastruktur digital di Sumatera Barat.',
                'body' => '<p>APJII Wilayah Sumatera Barat menggelar sosialisasi hasil Survei Penetrasi dan Perilaku Pengguna Internet Indonesia 2026 bekerjasama dengan Universitas Andalas (Unand) Padang.</p><p>Acara ini membedah tren konsumsi data masyarakat Sumbar serta pentingnya inklusi digital bagi daerah 3T (Tertinggal, Terdepan, Terluar) di kepulauan Mentawai.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($postsData as $pData) {
            Post::create($pData);
        }

        $this->call([
            DownloadSeeder::class,
        ]);
    }
}
