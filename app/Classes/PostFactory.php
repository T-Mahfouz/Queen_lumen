<?php

namespace App\Classes;

class PostFactory implements PostFactoryInterface {
    public function getService(): ServiceInterface
    {
        return new Service();
    }

    public function getCategories(CategoryInterface $category): CategoryInterface
    {
        return $category;
    }

    public function getContact(): ContactInfoInterface
    {
        return new ContactInfo();
    }

    public function getAbout(): AboutUsInterface
    {
        return new AboutUs();
    }
}
