<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    /**
     * Atribut yang diizinkan untuk diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'category',
        'extension',
        'size',
        'file_path',
    ];
}