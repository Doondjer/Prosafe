<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_30x30 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(30, 30);
    }
}