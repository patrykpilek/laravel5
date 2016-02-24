var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css');

    mix.styles([
        'libs/bootstrap.min.css',
        'libs/select2.min.css',
        'libs/bootstrap-theme.min.css',
        'app.css'
    ]);

    mix.scripts([
        'libs/jquery-1.12.0.min.js',
        'libs/bootstrap.min.js',
        'libs/select2.min.js'
    ]);
});