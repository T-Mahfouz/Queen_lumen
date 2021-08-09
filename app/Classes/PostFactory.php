<?php

namespace App\Classes;

class PostFactory implements PostFactoryInterface {
    public function getService(): ServiceInterface
    {
        return new Service();
    }

    public function getProject(): ProjectInterface
    {
        return new Project();
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