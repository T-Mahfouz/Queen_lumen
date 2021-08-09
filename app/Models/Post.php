<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'wp_posts';

    public function images()
    {
        return $this->hasMany(Post::class, 'post_parent', 'id')
            ->where('post_type','attachment')
            ->select(['ID as id','post_parent','guid as link']);
    }

    public function meta()
    {
        return $this->hasMany(PostMeta::class, 'post_id', 'ID');
    }

    public function mainImage()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', '_thumbnail_id');
    }

    public function metaImages()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', 'dfiFeatured');
    }

    public function contactMeta()
    {
        return $this->hasMany(PostMeta::class, 'post_id', 'ID')
            ->whereIn('meta_key', ['email', 'address', 'latitude', 'longitude'])
            ->select('meta_key', 'meta_value');
    }

    public function contactMetaPhones()
    {
        return $this->hasMany(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', 'LIKE', 'phone_numbers_%')
            ->select('meta_value');
    }

    public function aboutUsMeta()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', 'short_description')
            ->select('meta_value');
    }
    
    public function aboutImage()
    {
        return $this->hasOne(Post::class, 'post_parent', 'ID')
            ->where('post_type','attachment')
            ->select('guid as link');
    }
}
