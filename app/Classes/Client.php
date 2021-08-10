<?php

namespace App\Classes;

use App\Models\Taxonomy;
use App\Models\TermRelation;

class Client extends PostLanguageAbstract implements CategoryInterface
{

    public function getTermTaxonomyIds($lang): Array
    {
        return TermRelation::whereIn(
            'object_id', $this->getLangPostsIds('post_clients', $lang)
        )
            ->pluck('term_taxonomy_id')->toArray();
    }

    public function getAllPosts($lang = 'en')
    {
        return Taxonomy::with(['term'])
            ->whereIn('term_taxonomy_id', $this->getTermTaxonomyIds($lang))
            ->clients()
            ->get();
    }

    public function getPostInfo($id)
    {
        return Taxonomy::with(['term'])->where('term_taxonomy_id', $id)->firstOrFail();
    }
}
