<?php

namespace App\Classes;

use App\Models\Post;
use App\Models\TermRelation;
use App\Models\TermTaxonomy;
use App\Models\Taxonomy;

class Project extends PostLanguageAbstract implements ProjectInterface {

    public function getTermTaxonomyIds($lang): Array
    {
        return TermRelation::whereIn(
            'object_id', $this->getLangPostsIds('post_st_projects', $lang)
        )
        ->pluck('term_taxonomy_id')->toArray();
    }

    public function getAllPosts($lang = 'en')
    {
        return Taxonomy::with(['term'])
            ->whereIn('term_taxonomy_id', $this->getTermTaxonomyIds($lang))
            ->categories()
            ->get();
    }

    public function getPostInfo($id)
    {
        return Taxonomy::with(['term'])->where('term_taxonomy_id', $id)->firstOrFail();
    }
}
