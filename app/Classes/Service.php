<?php

namespace App\Classes;

use App\Models\Post;

class Service extends PostLanguageAbstract implements ServiceInterface  {

    public function getAllPosts($lang = 'en')
    {
        return Post::select(['ID as id','post_title as title','post_excerpt as description'])
            ->with(['images'])
            ->whereIn('ID', $this->getLangPostsIds('post_st_services', $lang))
            ->get();
    }

    public function getPostInfo($id = 0)
    {
        Post::select('*')
            ->join('wp_icl_translations as t', function($join){
                $join->on('wp_posts.ID', '=', 't.element_id');
                $join->on('t.element_type', '=', 'wp_posts.post_type');
            })
            ->where('wp_posts.post_type','=','post')
            ->where('wp_posts.post_status','=','publish')
            ->where('t.language_code','=','en')
            ->where('wp_posts.post_type','=','post')
            ->orderBy('wp_posts.post_date', 'DESC')
            ->toSql();
    }
}
