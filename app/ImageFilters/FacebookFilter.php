<?php namespace Gallery\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class FacebookFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $image->fit(1200, 630);

        return $image;
    }
}
