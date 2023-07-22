<?php

namespace App\Http\Resources\V1;

use App\Models\UserScore;
use Illuminate\Http\Resources\Json\JsonResource;

class WinnerResource extends JsonResource
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
            'points' => $this->points,
            'wonAt' => $this->won_at,
            'userId' => $this->user_id,
            'username' => $this->userscore->name
        ];
    }
}