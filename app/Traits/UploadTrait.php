<?php

namespace Listbook\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    public function uploadImage($image,$imageName,$folder) {
        $imageName = str_slug($imageName);
        $folder = '/img/'.$folder.'/';
        $filepath = $folder. $imageName . '.' . $image->getClientOriginalExtension();
        $this->upload($image, $folder, 'public', $imageName);
        return $filepath;
    }

    private function upload(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

}