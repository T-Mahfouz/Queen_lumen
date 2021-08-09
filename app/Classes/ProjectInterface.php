<?php

namespace App\Classes;

interface ProjectInterface {
    public function getLangPostsIds($lang): Array;
    public function getTermTaxonomyIds($lang): Array;
    public function getAllPosts($lang = 'en');
    public function getPostInfo($id);
}