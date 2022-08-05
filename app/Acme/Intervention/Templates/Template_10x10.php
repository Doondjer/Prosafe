<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_10x10 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(10, 10);
    }
}