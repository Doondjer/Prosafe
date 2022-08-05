<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_80x80 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(80, 80);
    }
}