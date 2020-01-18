<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $gender = ($this->user_details->gender == 1) ? 'Male' : (($this->user_details->gender == 2) ? 'Female' : (($this->user_details->gender == 3) ? 'Other' : null));

        return [
            'id' => $this->id,
            'user elixir id' => $this->user_elixir_id,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'dob' => $this->user_details->dob,
            'gender' => $gender,
            'profile' => $this->user_details->profile,
            'verified' => $this->is_verified,
        ];
    }
}
