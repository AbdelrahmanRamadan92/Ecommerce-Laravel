<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get the category's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the products for this category.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
        // return $this->hasMany(Product::class, 'product_id', 'id');

    }
}
