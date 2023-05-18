<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'age'           => $this->age,
            'phone_no'      => $this->phone_no,
            'gender'        => $this->gender,
            'disease_id'    => $this->disease_id,
            'survey_score'  => $this->survey_score,
            'created_at'    => $this->created_at->diffForHumans(),
            'updated_at'    => $this->updated_at->diffForHumans()
        ];
    }
}
