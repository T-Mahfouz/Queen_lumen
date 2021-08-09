<?php

namespace App\Classes;

interface ContactInfoInterface {

    /**
     * @param array $meta
     * @param array $phones
     */
    public function prepareData($meta, $phones);

    public function getData($lang = 'en');
    
}