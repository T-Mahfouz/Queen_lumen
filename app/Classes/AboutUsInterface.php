<?php

namespace App\Classes;

interface AboutUsInterface {

    /**
     * @param App\Models\Post $post
     */
    public function prepareData($post);

    public function getData($lang = 'en');
    
}