<?php

if (!function_exists('abort_if_album_not_found')) {
    /**
     * @param Gallery\Album|null $album
     *
     * @return string
     */
    function abort_if_album_not_found($album)
    {
        if ( ! $album) {
            abort(404, 'The Album wasn\'t found.');
        }
    }
}

if (!function_exists('abort_if_image_not_found')) {
    /**
     * @param Gallery\Image|null $image
     *
     * @return string
     */
    function abort_if_image_not_found($image)
    {
        if ( ! $image) {
            abort(404, 'The Image wasn\'t found.');
        }
    }
}

if (!function_exists('bodyText')) {
    /**
     * @param  string $text
     *
     * @return string
     */
    function bodyText($text)
    {
        return nl2br($text);
    }
}

if (!function_exists('uploads_path')) {
    /**
     * @param string $albumId
     *
     * @return string
     */
    function uploads_path($albumId = null)
    {
        return base_path(config('gallery.uploadspath') . DIRECTORY_SEPARATOR . $albumId);
    }
}




if (!function_exists('album_url')) {
    /**
     * @param \Gallery\Album $album
     *
     * @return string
     */
    function album_url(\Gallery\Album $album)
    {
        return route('gallery.album', ['album_slug' => $album->slug]);
    }
}

if (!function_exists('image_url')) {
    /**
     * @param \Gallery\Album $album
     * @param \Gallery\Image $image
     *
     * @return string
     */
    function image_url(\Gallery\Album $album, \Gallery\Image $image)
    {
        return route('gallery.image', ['album_slug' => $album->slug, 'image_slug' => $image->slug]);
    }
}


if (!function_exists('template_image_path')) {
    /**
     * @param string $template Template defined in the imagecache config.
     * @param \Gallery\Album $album
     * @param \Gallery\Image $image
     *
     * @return string
     */
    function template_image_path($template, \Gallery\Album $album, \Gallery\Image $image)
    {
        return asset(config('imagecache.route') . "/{$template}/{$album->id}/{$image->file}");
    }
}

if (!function_exists('original_path')) {
    /**
     * @param \Gallery\Album $album
     * @param \Gallery\Image $image
     *
     * @return string
     */
    function original_path(\Gallery\Album $album, \Gallery\Image $image)
    {
        return template_image_path('original', $album, $image);
    }
}

if (!function_exists('image_path')) {
    /**
     * @param \Gallery\Album $album
     * @param \Gallery\Image $image
     *
     * @return string
     */
    function image_path(\Gallery\Album $album, \Gallery\Image $image)
    {
        return template_image_path('gallery', $album, $image);
    }
}

if (!function_exists('thumb_path')) {
    /**
     * @param \Gallery\Album $album
     * @param \Gallery\Image $image
     *
     * @return string
     */
    function thumb_path(\Gallery\Album $album, \Gallery\Image $image)
    {
        return template_image_path('thumbnail-512', $album, $image);
    }
}

if (!function_exists('facebook_path')) {
    /**
     * @param \Gallery\Album $album
     * @param \Gallery\Image $image
     *
     * @return string
     */
    function facebook_path(\Gallery\Album $album, \Gallery\Image $image)
    {
        return template_image_path('facebook', $album, $image);
    }
}
