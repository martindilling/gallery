var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var path = {
    'jquery': './bower_components/jquery/dist/',
    'bootstrap': {
        'scss': './bower_components/bootstrap/scss/',
        'js': './bower_components/bootstrap/js/dist/'
    },
    'dropzone': './bower_components/dropzone/dist/',
    'icomoon': 'resources/assets/vendor/icomoon/',
    'scripts': 'resources/assets/scripts/',
    'images': 'resources/assets/images/'
};

var out = {
    'css': 'public/assets/css/',
    'js': 'public/assets/js/',
    'fonts': 'public/build/assets/fonts/',
    'images': 'public/build/assets/images/'
};

elixir(function(mix) {

    /**
     * Gallery
     */
    mix.sass('gallery.scss', out.css + 'gallery.css', {includePaths: [path.bootstrap.scss]});

    mix.scripts(
        [
            path.jquery + 'jquery.js',
            path.bootstrap.js + 'util.js',
            path.bootstrap.js + 'alert.js',
            path.bootstrap.js + 'button.js',
            path.bootstrap.js + 'carousel.js',
            path.bootstrap.js + 'collapse.js',
            path.bootstrap.js + 'dropdown.js',
            path.bootstrap.js + 'modal.js',
            path.bootstrap.js + 'scrollspy.js',
            path.bootstrap.js + 'tab.js',
            path.bootstrap.js + 'tooltip.js',
            path.bootstrap.js + 'popover.js',
            path.scripts + 'jquery.exists.js',
            path.scripts + 'main.js',
        ],
        out.js + 'gallery.js',
        './'
    );


    /**
     * Admin
     */
    mix.sass('admin.scss', out.css + 'admin.css', {includePaths: [path.bootstrap.scss, path.dropzone]});

    mix.scripts(
        [
            path.jquery + 'jquery.js',
            path.bootstrap.js + 'util.js',
            path.bootstrap.js + 'alert.js',
            path.bootstrap.js + 'button.js',
            path.bootstrap.js + 'carousel.js',
            path.bootstrap.js + 'collapse.js',
            path.bootstrap.js + 'dropdown.js',
            path.bootstrap.js + 'modal.js',
            path.bootstrap.js + 'scrollspy.js',
            path.bootstrap.js + 'tab.js',
            path.bootstrap.js + 'tooltip.js',
            path.bootstrap.js + 'popover.js',
            path.dropzone + 'dropzone.js'
        ],
        out.js + 'admin.js',
        './'
    );


    /**
     * Versioning / Cache Busting
     */
    mix.version([
        out.css + 'gallery.css',
        out.js + 'gallery.js',
        out.css + 'admin.css',
        out.js + 'admin.js'
    ]);

    mix.copy(
        path.icomoon + 'fonts/*.*',
        out.fonts
    );

    mix.copy(
        path.images + '*.*',
        out.images
    );
});
