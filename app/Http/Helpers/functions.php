<?php


function jsonResponse($code = 200, $message = '', $data = [])
{
    return response()->json([
        'code' => getCode($code),
        'message'    => $message,
        'data'       => $data,
    ], getCode($code));
}

function getCode($code)
{
    return ($code >= 100 && $code <= 599) ? $code : 400;
}


function unserializeImages($string) {
    $images = [];
    $image_list = unserialize($string);
    if(is_array($image_list)) {
        foreach($image_list as $list) {
            $images = array_merge($images, explode(',', $list));
        }
    }
    return $images;
}


function getImagesList($string) {
    // $str = 'a:2:{i:0;s:89:"/2018/10/ideas-concept-laptop-screen-150x150.png,/2018/10/ideas-concept-laptop-screen.png";i:1;s:173:"/2018/10/hands-businesspeople-discussing-marketing-reports-presentation-tablet-150x150.png,/2018/10/hands-businesspeople-discussing-marketing-reports-presentation-tablet.png";}';
    // $re = '/.*?"(?<images>.*?)"/m';

    $str = preg_replace('/a:[0-9]+:|{|}|i:[0-9]+;s:[0-9]+:|"/', '', $string);
    $str = preg_replace('/;/', ',', $str);

    $images = array_filter(explode(',', $str), function($var){
        return ($var !== "");
    });

    return $images;
}

function getLang() {
    return request()->header('lang') ?? 'en';
}
