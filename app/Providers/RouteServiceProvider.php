<?php

namespace Gallery\Providers;

use Gallery\Album;
use Gallery\Image;
use Gallery\User;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Gallery\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('user', User::class);
        $router->model('album', Album::class);
        $router->model('image', Image::class);

        $router->bind('album_slug', function ($album_slug, Route $route) {
            $album = Album::where('slug', $album_slug)->active()->first();

            abort_if_album_not_found($album);

            return $album;
        });

        $router->bind('image_slug', function ($image_slug, Route $route) {
            $album = $route->parameter('album_slug');
            $image = $album->images()->where('slug', $image_slug)->active()->first();

            abort_if_image_not_found($image);

            return $image;
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
