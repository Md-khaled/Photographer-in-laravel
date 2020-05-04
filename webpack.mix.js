const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
    /*for Admin panel*/
   .scripts([
   'resources/assets/admin/js/vendor.bundle.js',
   'resources/assets/admin/js/app.bundle.js',
   ],'public/js/admin.js')
   .styles([
   'resources/assets/admin/css/vendor.bundle.css',
   'resources/assets/admin/css/app.bundle.css',
   'resources/assets/admin/css/theme-a.css',
   ],'public/css/admin.css')
   /*for frontend panel*/
   .scripts([
   'resources/assets/frontend/js/jquery.min.js',
   'resources/assets/frontend/js/bootstrap.min.js',
   'resources/assets/frontend/js/query.themepunch.tools.min838f.js',
   'resources/assets/frontend/js/jquery.themepunch.revolution.min838f.js',
   'resources/assets/frontend/js/revolution.extension.slideanims.min.js',
   'resources/assets/frontend/js/revolution.extension.layeranimation.min.js',
   'resources/assets/frontend/js/revolution.extension.navigation.min.js',
   'resources/assets/frontend/js/plugins.min.js',
   'resources/assets/frontend/js/scripts.min.js',
   'resources/assets/frontend/js/switchstylesheet.js',
   ],'public/front/js/app.js')
   .styles([
   'resources/assets/frontend/css/bootstrap.min.css',
   'resources/assets/frontend/css/plugins.css',
   'resources/assets/frontend/css/settings.css',
   'resources/assets/frontend/css/layers.css',
   'resources/assets/frontend/css/navigation.css',
   'resources/assets/frontend/css/style.css',
   'resources/assets/frontend/css/aqua.css',
   'resources/assets/frontend/css/icons.css',
   'resources/assets/frontend/switcher/aqua.css',
   'resources/assets/frontend/switcher/blue.css',
   'resources/assets/frontend/switcher/brown.css',
   'resources/assets/frontend/switcher/green.css',
   'resources/assets/frontend/switcher/lime.css',
   'resources/assets/frontend/switcher/pink.css',
   'resources/assets/frontend/switcher/purple.css',
   'resources/assets/frontend/switcher/red.css',
   'resources/assets/frontend/switcher/yellow.css',
   ],'public/front/css/app.css')
   .version();
