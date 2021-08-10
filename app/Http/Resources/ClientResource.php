<?php

namespace App\Http\Resources;

class ClientResource extends \Illuminate\Http\Resources\Json\JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $main_image = $this->post ?
            $this->post->mainImage ?
                $this->post->mainImage->mainImagePost ? $this->post->mainImage->mainImagePost->guid
                    : ''
                : ''
            : '';

        return [
            'id' => $this->post ? $this->post->ID : '',
            'title' => $this->post ? $this->post->post_title : '',
            'description' => $this->post ? $this->post->post_excerpt : '',
            'main_image' => $main_image,
        ];
    }
}
