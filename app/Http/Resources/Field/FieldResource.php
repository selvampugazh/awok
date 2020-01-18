<?php

namespace App\Http\Resources\Field;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldResource extends JsonResource
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
            'field_id' => $this->field_id,
            'name' => $this->name,
            'type_of_crops' => $this->type_of_crops,
            'area' => $this->area,
        ];
    }
}
