<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContainerResource extends JsonResource
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
            'id'=>$this->id,
            'serial'=>$this->serial,
            'number'=>$this->number,
            'image'=>$this->image,
            'tags'=>$this->tags,
            'status'=>$this->status_id,
            'district_id'=>$this->district->name,
            'user_id'=>$this->user->name,
            'localization'=>$this->localization
        ];
    }
}
