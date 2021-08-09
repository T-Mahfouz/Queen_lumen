<?php

namespace App\Classes;

use App\Models\Post;
use App\Models\PostMeta;

class AboutUs extends PageLanguageAbstract implements AboutUsInterface {

    private $data = [];
    
    /**
     * @param App\Models\Post $post
     */
    public function prepareData($post)
    {
        $this->data['title'] = $post->post_title;
        
        $this->data['description'] = strip_tags($post->aboutUsMeta->meta_value);

        $this->data['image'] = $post->aboutImage->link;
    }

    public function getData($lang = 'en')
    {
        $trid = $this->getPageIds();

        $trid_id = isset($trid['about_mobile_page']) ? $trid['about_mobile_page'] : null;

        $iclTranslation = $this->getIclTranslationId($trid_id, $lang);
        
        $post = Post::findOrFail($iclTranslation->element_id);

        $this->prepareData($post);

        return (object)$this->data;
    }
    
}