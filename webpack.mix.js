let mix = require('laravel-mix');


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .js('node_modules/bootstrap/dist/js/bootstrap.js', '/')
   .browserSync('laravelcourse.com');
