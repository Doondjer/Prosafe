<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_150x150 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(150, 150);
    }
}