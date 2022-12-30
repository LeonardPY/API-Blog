<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class BaseService
{
    public function saveImage($image, $path = 'public')
    {
        if($image)
        {
            return null;
        }

        $filename = time().'.png';
        // save image
        Storage::disk($path)->put($filename, base64_decode($image));

        // return the path
        // Url is the base url exp: localhost:8000
        return URL::to('/').'/storage/'.$path.'/'.$filename;
    }
}
