<?php namespace Gallery\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class BigThumbnailFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $image->fit(512);

        return $image;
    }
}
