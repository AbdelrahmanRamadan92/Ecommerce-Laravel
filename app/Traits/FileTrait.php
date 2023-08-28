<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    /**
     * upload the file and Store filename in Database.
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

    /**
     * delete the file if exists.
     * @param  string  $disk
     * @param  string  $directoryName
     * @param  string  $imageId
     * @return string|null
     */
    protected function deleteFileIfExists(String $disk, String $directoryName, String $imageId)
    {
        $image = Image::find($imageId);
        $fileName = $image->filename;

        //delete file from storage disk
        $storage = Storage::disk($disk);
        $storagePath     = $directoryName . '/' . $fileName;
        if ($storage->exists($storagePath)) {
            return $storage->delete($storagePath);
        }

        //delete file  from database
        $image->delete();
    }
    /**
     * delete and put new file in storage and  update filename in Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $fieldName
     * @param  string  $disk
     * @param  string  $imageable_id
     * @param  string  $directoryName
     * @param  string  $imageId

     * @return string|null
     */
    protected function updateFile(Request $request, String $fieldName, String $disk, String $directoryName, String $imageId)
    {
        $image = Image::find($imageId);
        $oldFileName = $image->filename;
        $file = $request->file($fieldName);
        $fileName = time() . '.' . $file->extension();

        //delete old file from storage disk
        $storage = Storage::disk($disk);
        $storagePath     = $directoryName . '/' . $oldFileName;
        if ($storage->exists($storagePath)) {
            $storage->delete($storagePath);
        }

        //update file name in Database
        $image->filename = $fileName;
        $image->save();

        // Upload the new file to the specified storage path
        return $file->storeAs($directoryName, $fileName, $disk);
    }
}
