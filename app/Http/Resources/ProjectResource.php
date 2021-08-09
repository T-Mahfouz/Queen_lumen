<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
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

        $meta_value = $this->post ? 
            $this->post->metaImages ? 
                $this->post->metaImages->meta_value
            : ''
        : '';

        return [
            'id' => $this->post ? $this->post->ID : '',
            'title' => $this->post ? $this->post->post_title : '',
            'description' => $this->post ? $this->post->post_excerpt : '',
            'main_image' => $main_image,
            'images' => unserializeImages($meta_value)
        ];
    }
}
