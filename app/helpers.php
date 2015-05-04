<?php

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




if (!function_exists('image_template')) {
    /**
     * @param string $template
     *
     * @return string
     */
    function image_template($template = 'original')
    {
        return asset(config('imagecache.route') . DIRECTORY_SEPARATOR . $template . DIRECTORY_SEPARATOR);
    }
}

if (!function_exists('original_path')) {
    /**
     * @param string $albumId
     * @param string $imageFile
     *
     * @return string
     */
    function original_path($albumId, $imageFile = null)
    {
        return image_template('original') . DIRECTORY_SEPARATOR . $albumId . DIRECTORY_SEPARATOR . $imageFile;
    }
}

if (!function_exists('image_path')) {
    /**
     * @param string $albumId
     * @param string $imageFile
     *
     * @return string
     */
    function image_path($albumId, $imageFile = null)
    {
        return image_template('gallery') . DIRECTORY_SEPARATOR . $albumId . DIRECTORY_SEPARATOR . $imageFile;
    }
}

if (!function_exists('thumb_path')) {
    /**
     * @param string $albumId
     * @param string $imageFile
     *
     * @return string
     */
    function thumb_path($albumId, $imageFile = null)
    {
        return image_template('thumbnail-256') . DIRECTORY_SEPARATOR . $albumId . DIRECTORY_SEPARATOR . $imageFile;
    }
}
