<?php

namespace Acme\Intervention\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Template_28x28 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(28, 28);
    }
}