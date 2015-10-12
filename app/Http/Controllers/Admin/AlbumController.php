<?php namespace Gallery\Http\Controllers\Admin;

use Gallery\Album;
use Gallery\Http\Requests;
use Gallery\Http\Controllers\Controller;

use Gallery\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Intervention;
use File;
use DB;

class AlbumController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {
        $albums = Album::all();

        return view('admin.albums.index', compact('albums'));
    }

    /**
     * @return Response
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->input();

        $input['slug'] = Str::slug($input['slug'] ?: $input['title']);

        Album::create($input);

        return redirect(route('admin.albums.index'));
    }

    /**
     * @param \Gallery\Album $album
     *
     * @return \Gallery\Http\Controllers\Response
     */
    public function show(Album $album)
    {
        $images = $album->images ?: new Collection();

        return view('admin.albums.show', compact('album', 'images'));
    }

    /**
     * @param \Gallery\Album $album
     *
     * @return \Gallery\Http\Controllers\Response
     */
    public function edit(Album $album)
    {
        $images = $album->images ?: new Collection();

        return view('admin.albums.edit', compact('album', 'images'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Gallery\Album           $album
     *
     * @return \Gallery\Http\Controllers\Response
     */
    public function update(Request $request, Album $album)
    {
        $input = $request->input();

        $input['slug'] = Str::slug($input['slug'] ?: $input['title']);

        $album->update($input);

        return redirect(route('admin.albums.index'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Gallery\Album           $album
     *
     * @return \Gallery\Http\Controllers\Response
     */
    public function upload(Request $request, Album $album)
    {
        try {
            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();
            $title     = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename  = Str::slug($title . '-' . Str::random(5)) . '.' . $extension;

            $uploadedFile = $file->move(uploads_path($album->id), $filename);

            if ($uploadedFile) {

                $image = Intervention::make($uploadedFile->getRealPath());
                $image->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save();

                /** @var Image $image */
                $image = $album->images()->create([
                    'file'  => $filename,
                    'title' => $title,
                    'slug'  => Str::slug($title),
                ]);

                if (!$album->cover) {
                    $album->cover()->associate($image);
                    $album->save();
                }

                return response()->json('success', 200);
            } else {
                return response()->json('error', 400);
            }
        } catch (\Exception $e) {
            if ($uploadedFile && File::exists($uploadedFile->getRealPath())) {
                File::delete($uploadedFile->getRealPath());
            }

            $fileLine     = pathinfo($e->getFile(), PATHINFO_FILENAME) . ':' . $e->getLine();
            $errorMessage = "Server error [" . $fileLine . "]:\n" . $e->getMessage();

            return response()->json($errorMessage, 500);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Gallery\Album           $album
     *
     * @return \Gallery\Http\Controllers\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Album $album)
    {
        DB::beginTransaction();
        $id = $album->id;

        try {
            if (!$album->images()->delete()) {
                throw new \Exception('Images not deleted!');
            }

            if (!$album->delete()) {
                throw new \Exception('Album not deleted!');
            }

            if (File::exists(uploads_path($id)) && !File::deleteDirectory(uploads_path($id))) {
                throw new \Exception('Image files not deleted!');
            }

            if (File::exists(uploads_path($id))) {
                throw new \Exception('Image files not deleted!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return redirect(route('admin.albums.index'));
    }
}
