<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermRelation extends Model
{
    use HasFactory;

    protected $table = 'wp_term_relationships';

    public function post()
    {
        return $this->belongsTo(Post::class, 'object_id', 'ID')->withDefault();
    }
}
