<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use HasFactory;

    protected $table = 'wp_postmeta';

    public function mainImagePost()
    {
        return $this->belongsTo(Post::class, 'meta_value', 'ID')
            ->withDefault();
    }

    public function postImages()
    {
        return $this->belongsTo(Post::class, 'meta_value', 'ID')
            ->withDefault();
    }
}
