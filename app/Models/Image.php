<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['filename','imageable_id','imageable_type'];

    // Get the parent imageable model
    public function imageable(): MorphTo
    {
        return $this->morphTo();

        // you may specify the name of the "id" and "type" columns utilized by your polymorphic child model 
        // return $this->morphTo(__FUNCTION__, 'imageable_type', 'imageable_id');

    }
}
