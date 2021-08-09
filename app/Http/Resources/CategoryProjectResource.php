<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->term_taxonomy_id,
            'name' => $this->term ? $this->term->name : '',
            'projects' => ProjectResource::collection($this->projects)
        ];
    }
}
