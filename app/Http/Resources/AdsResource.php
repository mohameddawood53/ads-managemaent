<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "title" => $this->title,
            "description" => $this->description,
            "type" => $this->type,
            "start_date" => $this->start_date,
            "advertiser" => $this->whenLoaded("advertiser" , new AdvertiserResource($this->advertiser) ),
            "category" => $this->whenLoaded("category" , new CategoryResource($this->category) ),
        ];
    }
}
