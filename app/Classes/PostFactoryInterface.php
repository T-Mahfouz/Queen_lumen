<?php

namespace App\Classes;

interface PostFactoryInterface {

    /**
     * @return ServiceInterface
     */
    public function getService();

    /**
     * @return ProjectInterface
     */ 
    public function getProject();

    /**
     * @return ContactInfoInterface
     */
    public function getContact();

    /**
     * @return AboutUsInterface
     */
    public function getAbout();
}