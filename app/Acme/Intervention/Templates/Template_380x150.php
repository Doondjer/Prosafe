<?php

namespace App\Acme\Intervention\Templates;
use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_380x150 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(380, 150);
    }
}
