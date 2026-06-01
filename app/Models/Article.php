<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // V5.3.4 — Gunakan $fillable (whitelist) bukan $guarded
    // Mencegah mass assignment vulnerability
    protected $fillable = [
        'title',
        'content',
        'image_thumbnail',
    ];
}