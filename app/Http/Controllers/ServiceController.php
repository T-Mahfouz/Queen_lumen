<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Service;
use App\Http\Resources\PostServiceResource;

class ServiceController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $lang = getLang();

        try {

            $posts = $this->services->getAllPosts($lang);

            $response = PostServiceResource::collection($posts);

        } catch (\Exception $e) {

            return jsonResponse($e->getCode(), $e->getMessage());

        }

        return jsonResponse(200, 'done', $response);
    }
}
