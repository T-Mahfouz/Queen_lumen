<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ContactUsResource;
use App\Http\Resources\AboutUsResource;

class SettingsController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $lang = $request->header('lang') ?? 'en';
        
        try {
            $response = [
                'contact-us' => new ContactUsResource($this->contact->getData($lang)),
                'about-us' => new AboutUsResource($this->about->getData($lang)),
            ];

        } catch (\Exception $e) {

            return jsonResponse($e->getCode(), $e->getMessage());

        }

        return jsonResponse(200, 'done', $response);
    }

    public function test()
    {
        $txt = '';
        $unserialized = unserialize($txt);
        return $unserialized;
    }
}