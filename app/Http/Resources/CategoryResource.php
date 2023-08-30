<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => new ImageResource($this->image),
            //conditional whenLoaded() method avoid unnecessarily loading relationships
            //Object of ProductResource Class created only when category relationship is loaded  
            'products' =>  ProductResource::collection($this->whenLoaded('products')),

        ];
    }
}
