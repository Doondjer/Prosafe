<?php

namespace App\Acme\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait UploadTrait {

    /**
     * Generate more unique name then hashName()
     * @param UploadedFile $upload
     * @return string
     */
    public function generateName(UploadedFile $upload)
    {
        if ($extension = $upload->guessExtension()) {
            $extension = '.'.$extension;
        }

        return Str::orderedUuid()->toString() . $extension;
    }
}
