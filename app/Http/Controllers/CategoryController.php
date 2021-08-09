<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taxonomy;
use App\Http\Resources\CategoryProjectResource;

class CategoryController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $lang = getLang();

        try {

            $categories = $this->projects->getAllPosts($lang);

            $response = CategoryProjectResource::collection($categories);

        } catch (\Exception $e) {

            return jsonResponse($e->getCode(), $e->getMessage());

        }

        return jsonResponse(200, 'done', $response);
    }

    public function show($id)
    {
        try {

            $category = $this->projects->getPostInfo($id);

            $response = new CategoryProjectResource($category);

        } catch (\Exception $e) {

            return jsonResponse($e->getCode(), 'something went wrong!');

        }

        return jsonResponse(200, 'done', $response);
    }

}
