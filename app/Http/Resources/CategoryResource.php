<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryResource extends ResourceCollection
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
        //     'image' => new ImageResource($this->image),
        //     'products' =>  new ProductResource($this->products),
        // ];
    }
}
