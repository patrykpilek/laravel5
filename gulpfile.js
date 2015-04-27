var elixir = require('laravel-elixir');

var bowerDir = './resources/assets/vendor/';

var paths = {
    'jquery': bowerDir + 'jquery/',
    'bootstrap': bowerDir + 'bootstrap-sass-official/assets/',
    'fontawesome': bowerDir + 'font-awesome/',
    'bootstrapselect': bowerDir + 'bootstrap-select-sass/'
};

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/', {
        includePaths: [
            paths.bootstrap + 'stylesheets',
            paths.fontawesome + 'scss',
            paths.bootstrapselect + 'sass',
            'vendor/normalize.css'
        ]
    })
        .scripts([
            paths.jquery + 'dist/jquery.min.js',
            paths.bootstrap + 'javascripts/bootstrap.min.js',
            paths.bootstrapselect + 'dist/js/bootstrap-select.min.js'
        ], 'public/js/vendor.js', bowerDir)
        .copy('resources/assets/js/app.js', 'public/js/app.js')
        .copy(paths.fontawesome + 'fonts', 'public/fonts');

});