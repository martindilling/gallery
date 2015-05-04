<?php namespace Gallery\Http\Controllers\Admin;

use Gallery\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gallery\Album;
use Gallery\Image;

class ImageController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Image $image)
    {
        //
    }

    public function edit(Image $image)
    {
        $album = $image->album;
        $isCover = $image->isCover();

        return view('admin.images.edit', compact('album', 'image', 'isCover'));
    }

    public function update(Request $request, Image $image)
    {
        $image->update([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'active'      => $request->input('active', false),
        ]);

        if ($request->input('is_cover', false)) {
            $album = $image->album;
            $album->cover()->associate($image);
            $album->save();
        }

        if ($request->input('submit-previous')) {
            $previous = $image->album->images()->where('id', '<', $image->id)->max('id');

            if (!$previous) {
                $previous = $image->album->images()->max('id');
            }

            return redirect(route('admin.images.edit', ['image' => $previous]));
        }

        if ($request->input('submit-next')) {
            $next = $image->album->images()->where('id', '>', $image->id)->min('id');

            if (!$next) {
                $next = $image->album->images()->min('id');
            }

            return redirect(route('admin.images.edit', ['image' => $next]));
        }

        return back();
    }

    public function destroy(Request $request, Image $image)
    {
        //
    }
}
