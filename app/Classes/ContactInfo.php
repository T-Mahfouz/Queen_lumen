<?php

namespace App\Classes;

use App\Models\Post;
use App\Models\PostMeta;

class ContactInfo extends PageLanguageAbstract implements ContactInfoInterface {

    private $data = [];

    /**
     * @param array $meta
     * @param array $phones
     */
    public function prepareData($meta, $phones)
    {
        foreach($meta as $key => $value) {
            $this->data[$value['meta_key']] = $value['meta_value'];
        }

        $this->data['phones'] = collect($phones)->pluck('meta_value')->toArray();
    }

    public function getData($lang = 'en')
    {
        $trid = $this->getPageIds();

        $trid_id = isset($trid['contact_mobile_page']) ? $trid['contact_mobile_page'] : null;

        $iclTranslation = $this->getIclTranslationId($trid_id, $lang);

        $post = Post::findOrFail($iclTranslation->element_id);
        
        $this->prepareData($post->contactMeta, $post->contactMetaPhones);

        return (object)$this->data;
    }
    
}