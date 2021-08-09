<?php

namespace App\Classes;

use App\Models\IclTranslation;

abstract class PostLanguageAbstract {

    public function getLangPostsIds($type, $lang = 'en'): Array
    {
        return IclTranslation::where([
            'language_code' => $lang,
            'element_type' => $type
        ])->pluck('element_id')->toArray();
    }
}

