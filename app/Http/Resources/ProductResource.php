<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'short_description' => $this->short_description,
            'status' => $this->status,
            'long_description' => $this->long_description,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'price' => PriceResource::collection($this->whenLoaded('price'))
        ];
    }
}
