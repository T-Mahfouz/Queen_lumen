<?php

namespace App\Http\Controllers;

use App\Classes\PostFactory;

class InitController extends Controller
{
    protected $projects;
    protected $services;
    protected $contact;
    protected $about;

    public function __construct()
    {
        $factory = new PostFactory();
        
        $this->services = $factory->getService();
        $this->projects = $factory->getProject();
        $this->contact = $factory->getContact();
        $this->about = $factory->getAbout();
    }
}

