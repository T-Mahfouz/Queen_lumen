<?php

namespace App\Classes;

use App\Models\IclTranslation;
use App\Models\Option;

abstract class PageLanguageAbstract {

    public function getPageIds()
    {
        $option = Option::where('option_name', 'redux_demo')->first();

        $arr = unserialize($option->option_value);

        return $arr;
    }

    public function getIclTranslationId($id, $lang = 'en')
    {
        return IclTranslation::select('element_id')
            ->where(['trid' => $id, 'language_code' => $lang])
            ->first();
    }
}