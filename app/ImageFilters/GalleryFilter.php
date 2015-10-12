<?php namespace Gallery\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class GalleryFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $image->resize(null, 760, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->insert(public_path('img' . DIRECTORY_SEPARATOR . 'watermark.png'), 'bottom-right');

        return $image;
    }
}
