<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource {

    /** 
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
    */
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'address' => $this->address,
            'lat' => $this->latitude,
            'lon' => $this->longitude,
            'phones' => $this->phones,
        ];
    }
}