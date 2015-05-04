<?php namespace Gallery\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function get()
    {
        return view('upload');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Gallery\Http\Controllers\Response
     */
    public function post(Request $request)
    {
//		dd($request->input());

        $file            = $request->file('file');
        $destinationPath = config('gallery.paths.tmp');
        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
//        $filename = str_random(12);

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);

        if ($upload_success) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }
//		return view('home');
    }
}
