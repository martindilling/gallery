<?php namespace Gallery\Http\Controllers;

use Gallery\Album;
use Gallery\Image;

class GalleryController extends Controller
{
    public function albums()
    {
        $albums = Album::with('images')->whereActive(true)->get();

        return view('gallery.albums', compact('albums'));
    }

    public function album(Album $album)
    {
//        $album = Album::with('images')->where('folder', $album_folder)->first();

        if ( ! $album->isActive() ) {
            abort(404, 'Album wasn\'t found.');
        }

        $images = $album->images()->whereActive(true)->get();

        return view('gallery.album', compact('album', 'images'));
    }

    public function image(Album $album, Image $image)
    {
//        $album = Album::with('images')->where('folder', $album_folder)->first();
        // $image = Image::with('album')->find($image_id);

        if ( ! $album->isActive() ) {
            abort(404, 'Album wasn\'t found.');
        }

        $previousId = $album->images()->where('id', '<', $image->id)->whereActive(true)->max('id');

        if (!$previousId) {
            $previousId = $album->images()->whereActive(true)->max('id');
        }

        $nextId = $album->images()->where('id', '>', $image->id)->whereActive(true)->min('id');

        if (!$nextId) {
            $nextId = $album->images()->whereActive(true)->min('id');
        }

        $previous = $album->images()->whereActive(true)->find($previousId);
        $next = $album->images()->whereActive(true)->find($nextId);

        $current = $album->images()->where('id', '<', $image->id)->whereActive(true)->count() + 1;
        $count = $album->images()->whereActive(true)->count();


        return view('gallery.image', compact('image', 'previous', 'next', 'count', 'current'));
    }
}
