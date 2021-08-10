<?php

namespace App\Http\Controllers;

use App\Classes\Client;
use App\Classes\PostFactory;
use App\Classes\Project;

class InitController extends Controller
{
    protected $projects;
    protected $clients;
    protected $services;
    protected $contact;
    protected $about;

    public function __construct()
    {
        $factory = new PostFactory();

        $this->services = $factory->getService();
        $this->contact = $factory->getContact();
        $this->about = $factory->getAbout();

        $this->projects = $factory->getCategories(new Project());
        $this->clients = $factory->getCategories(new Client());
    }
}

