<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicPostController extends Controller
{
    public function home()
    {
        $latestPosts = Post::with('category')
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = Category::withCount(['posts' => function ($query) {
            $query->where('status', 'published');
        }])->get();

        return view('frontend.home', compact('latestPosts', 'categories'));
    }

    public function index(Request $request)
    {
        $query = Post::with('category')->where('status', 'published');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->category;
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $posts = $query->latest('published_at')->paginate(6)->withQueryString();

        $categories = Category::withCount(['posts' => function ($q) {
            $q->where('status', 'published');
        }])->get();

        $currentCategory = $request->filled('category') ? Category::where('slug', $request->category)->first() : null;

        return view('frontend.posts.index', compact('posts', 'categories', 'currentCategory'));
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::with('category')
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('frontend.posts.show', compact('post', 'relatedPosts'));
    }

    public function kepengurusan()
    {
        $ketua = [
            'name' => 'Darmawi',
            'role' => 'Ketua Pengurus Wilayah',
            'company' => 'PT Marawa Transmisi Media',
        ];

        $pengurusInti = [
            [
                'name' => 'Budi S',
                'role' => 'Sekretaris',
                'company' => 'PT Carano Tech Solusi',
            ],
            [
                'name' => 'Aan Rizal',
                'role' => 'Bendahara',
                'company' => 'PT Gogiga Media Teknologi',
            ],
        ];

        $ketuaBidang = [
            [
                'role' => 'Ketua Bidang Organisasi dan Layanan',
                'name' => 'Suhardedi',
                'company' => 'PT Gnet Biaro Akses',
            ],
            [
                'role' => 'Ketua Bidang Regulasi',
                'name' => 'Muhammad Aditya',
                'company' => 'PT Irama Media Flashnet',
            ],
            [
                'role' => 'Ketua Bidang Hubungan Masyarakat',
                'name' => 'Riano Oskar',
                'company' => 'PT CinoxMedia Network Indonesia',
            ],
            [
                'role' => 'Ketua Bidang Advokasi',
                'name' => 'Novriadi',
                'company' => 'PT Skynet Network Bersama',
            ],
            [
                'role' => 'Ketua Bidang IX dan Data Center',
                'name' => 'Amirullah',
                'company' => 'PT Gnet Biaro Data',
            ],
            [
                'role' => 'Ketua Bidang Kelembagaan',
                'name' => 'Yonaldi',
                'company' => 'PT Media Tekno Nusantara',
            ],
            [
                'role' => 'Ketua Bidang Sistem Informasi dan Pengembangan Sumber Daya Anggota',
                'name' => 'Rusrian Yuzaf',
                'company' => 'PT Salingka Telekomunikasi Nusantara',
            ],
        ];

        $officeInfo = [
            'address' => 'Jl Batang Anai No 4A, GOR H Agus Salim, Kel. Rimbo Kaluang, Kota Padang, Sumatera Barat 25111',
            'email' => 'darmawi.apjiisumbar@gmail.com',
            'phone' => '081274055771',
        ];

        return view('frontend.kepengurusan', compact('ketua', 'pengurusInti', 'ketuaBidang', 'officeInfo'));
    }
}
