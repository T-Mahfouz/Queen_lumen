<?php

namespace App\Http\Resources;

class CategoryClientResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->term_taxonomy_id,
            'name' => $this->term ? $this->term->name : '',
            'clients' => ClientResource::collection($this->projects)
        ];
    }
}
