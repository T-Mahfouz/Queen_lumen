<?php

namespace App\Classes;

interface ServiceInterface {
    public function getAllPosts($lang = 'en');
    public function getPostInfo($id);
}