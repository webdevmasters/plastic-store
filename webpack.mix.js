const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/external/jquery.min.js',
        'resources/js/external/jquery-ui.js',
        'resources/js/external/jquery-validate.min.js',
        'resources/js/external/popper.min.js',
        'resources/js/external/jquery-data-tables.js',
        'resources/js/external/bootstrap.min.js',
        'resources/js/external/data-tables.js',
        'resources/js/external/select2.js',
        'resources/js/external/ajax-es6-shim.js',
        'resources/js/external/bootstrap-select.js',
        'resources/js/external/bootbox.js',
    ], 'public/js/external/external.js')
    .scripts([
        'resources/js/webapp/plugins.js',
        'resources/js/webapp/main.js',
        'resources/js/webapp/validation.js',
        'resources/js/webapp/minicart.js',
        'resources/js/webapp/messages_sr.js',
    ], 'public/js/webapp/main.js')
    .scripts([
        'resources/js/administration/administration.js',
        'resources/js/administration/img-upload.js',
        'resources/js/administration/product-validation.js',
        'resources/js/administration/table.js',
    ], 'public/js/administration/admin.js')
    .styles([
        'resources/css/external/bootstrap.css',
        'resources/css/external/font-awesome.min.css',
        'resources/css/external/ionicons.min.css',
        'resources/css/external/data-tables.css',
        'resources/css/external/select2.css',
    ], 'public/css/external/external.css')
    .styles([
        'resources/css/administration/bootstrap-select.css',
        'resources/css/administration/admin.css',
        'resources/css/administration/image-upload.css',
        'resources/css/administration/product.css',
        'resources/css/administration/table.css'
    ], 'public/css/administration/admin.css')
    .styles([
        'resources/css/webapp/plugins.css',
        'resources/css/webapp/helper.css',
        'resources/css/webapp/preloader.css'
    ], 'public/css/webapp/theme.css')
    .styles([
        'resources/css/webapp/main.css',
    ], 'public/css/webapp/main.css')
    .sass('resources/sass/app.scss', 'public/css/app');



