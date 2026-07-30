<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $postId = $this->route('post')?->id ?? $this->route('post');

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($postId)],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg,gif', 'max:4096'],
            'status' => ['required', 'in:draft,published'],
        ];
    }

    public function messages(): array
    {
        return [
            'featured_image.image' => 'File featured image harus berupa gambar.',
            'featured_image.mimes' => 'Format file tidak diizinkan! Hanya ekstensi gambar yang diperbolehkan (PNG, JPG, JPEG, WEBP, SVG, GIF).',
            'featured_image.max' => 'Ukuran gambar maksimal adalah 4MB.',
        ];
    }
}
