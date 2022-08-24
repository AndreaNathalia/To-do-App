const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js').vue();
// mix.postCss('resources/css/app.css', 'public/css');
mix.browserSync({proxy:'localhost:3000'});

mix.js('resources/js/app.js', 'public/js').vue()
.postCss('resources/css/app.css', 'public/css', [
        //
]);

