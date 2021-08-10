<?php

namespace App\Classes;

interface CategoryInterface {
    public function getTermTaxonomyIds($lang): Array;
    public function getAllPosts($lang = 'en');
    public function getPostInfo($id);
}
