<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'id' => $this->id,
            'group_name' => $this->group_name,
            'is_active' => $this->is_active,
            // 'user' => [
            //     'id' => $this->id,
            //     'profile_id' => [
            //         'id' => $this->id,
            //         'name' => $this->name,
            //         'email' => $this->email,
            //     ],
            // ],
        ];
    }
}
