<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return Parent::toArray($request);

        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'price' => $this->price,
        //     'category_id' => $this->category_id,
        //     'image' => new ImageResource($this->image),
        //     'categoory' =>  CategoryResource::collection($this->category),
        // ];
    }
}
 
  