<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryClientResource;
use App\Http\Resources\CategoryProjectResource;
use Illuminate\Http\Request;

class ClientController extends InitController
{
     public function __construct()
     {
         parent::__construct();
     }

     public function index(Request $request)
     {
         $lang = getLang();

         try {

             $clients = $this->clients->getAllPosts($lang);

             $response = CategoryClientResource::collection($clients);

         } catch (\Exception $e) {

             return jsonResponse($e->getCode(), $e->getMessage());

         }

         return jsonResponse(200, 'done', $response);
     }
}
