<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_64x64 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(64,64)->mask('mask.png');
    }
}