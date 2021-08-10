<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    use HasFactory;

    protected $table = 'wp_term_taxonomy';
    protected $appends = ['projects'];

    public function scopeProjects($query)
    {
        return $query->where('taxonomy','st-projects-category');
    }

    public function scopeClients($query)
    {
        return $query->where('taxonomy','st-clients-category');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id', 'term_id');
    }

    public function termRelations()
    {
        return $this->hasMany(TermRelation::class, 'term_taxonomy_id');
    }

    public function getProjectsAttribute()
    {
        return TermRelation::with([
                'post','post.images','post.mainImage.mainImagePost',
                'post.metaImages'
            ])
            // ->whereHas('post', function ($query) {
            //     $query->whereIn('id', [386]);
            // })
            ->where('term_taxonomy_id', $this->term_taxonomy_id)
            ->get();
    }

}
