<?php namespace Gallery\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class ThumbnailFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $image->fit(256);

        return $image;
    }
}
