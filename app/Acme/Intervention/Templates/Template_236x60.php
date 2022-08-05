<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_236x60 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(236, 60);
    }
}