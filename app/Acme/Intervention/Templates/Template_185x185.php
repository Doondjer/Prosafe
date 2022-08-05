<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_185x185 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(185, 185);
    }
}