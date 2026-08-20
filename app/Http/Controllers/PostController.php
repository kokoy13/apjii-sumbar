<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['body']), 160);
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $validated['featured_image'] = $path;
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita / Artikel berhasil diterbitkan.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['body']), 160);
        }

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $path = $request->file('featured_image')->store('posts', 'public');
            $validated['featured_image'] = $path;
        }

        if ($validated['status'] === 'published' && !$post->published_at) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita / Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita / Artikel berhasil dihapus.');
    }

    public function uploadImage(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:png,jpg,jpeg,webp,gif,svg|max:4096',
        ]);

        $path = $request->file('file')->store('posts/editor', 'public');

        return response()->json([
            'location' => asset('storage/' . $path),
        ]);
    }
}
