<?php namespace Gallery\Http\Controllers;

use Clockwork;
use Gallery\Album;
use Gallery\Image;

class GalleryController extends Controller
{
    public function albums()
    {
        $albums = Album::with(['images', 'cover'])->active()->get();

        return view('gallery.albums', compact('albums'));
    }

    public function album(Album $album)
    {
        if ( ! $album->isActive()) {
            abort(404, 'The Album wasn\'t found.');
        }

        $images = $album->images()->active()->get();

        return view('gallery.album', compact('album', 'images'));
    }

    public function image(Album $album, Image $image)
    {
        if ( ! $album->isActive()) {
            abort(404, 'The Album wasn\'t found.');
        }

        /** @var \Illuminate\Database\Eloquent\Collection $images */
        $images = $album->images()->active()->get();

        $previousId = $images->filter(function ($item) use ($image) {
            return $item->id < $image->id;
        })->max('id');

        if ( ! $previousId) {
            $previousId = $images->max('id');
        }

        $nextId = $images->filter(function ($item) use ($image) {
            return $item->id > $image->id;
        })->min('id');

        if ( ! $nextId) {
            $nextId = $images->min('id');
        }

        $previous = $images->find($previousId);
        $next = $images->find($nextId);

        $current = $images->filter(function ($item) use ($image) {
            return $item->id < $image->id;
        })->count() + 1;
        $count = $images->count();

        return view('gallery.image', compact('album', 'image', 'previous', 'next', 'count', 'current'));
    }
}
