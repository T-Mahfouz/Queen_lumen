<?php

namespace App\Classes;

interface PostFactoryInterface {

    /**
     * @return ServiceInterface
     */
    public function getService();

    /**
     * @return CategoryInterface
     */
    public function getCategories(CategoryInterface $category);

    /**
     * @return ContactInfoInterface
     */
    public function getContact();

    /**
     * @return AboutUsInterface
     */
    public function getAbout();
}
