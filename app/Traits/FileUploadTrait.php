<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

trait FileUploadTrait
{
    /**
     * upload the file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $fieldName
     * @param  string  $storagePath
     * @param  string  $disk
     * @param  string  $imageable_id
     * @param  string  $imageable_type
     * @return string|null
     */
    protected function uploadFile(Request $request, String $fieldName, String $storagePath, String $disk, String $imageable_id, String $imageable_type)
    {
        $file = $request->file($fieldName);

        // Generate a unique file name
        $fileName = time() . '.' . $file->extension();

        // Insert Image data into Database
        $image = new Image;
        $image->filename = $fileName;
        $image->imageable_id = $imageable_id;
        $image->imageable_type = $imageable_type;
        $image->save();


        // Upload the file to the specified storage path
        return $file->storeAs($storagePath, $fileName, $disk);
    }
}
