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
        'resources/js/external/jquery.js',
        'resources/js/external/jquery-data-tables.js',
        'resources/js/external/data-tables.js',
        'resources/js/external/select2.js',
    ], 'public/js/external/external.js')
    .scripts([
        'resources/js/administration/administration.js',
        'resources/js/administration/img-upload.js',
        'resources/js/administration/product-validation.js',
        'resources/js/administration/table.js',
    ], 'public/js/administration/admin.js')
    .styles([
        'resources/css/administration/admin.css',
        'resources/css/administration/image-upload.css',
        'resources/css/administration/product.css',
        'resources/css/administration/table.css'
    ], 'public/css/administration/admin.css')
    .styles([
        'resources/css/external/bootstrap-4.3.1.css',
        'resources/css/external/bootstrap-select.css',
        'resources/css/external/bootstrap-validator.css',
        'resources/css/external/data-tables.css',
        'resources/css/external/font-awesome-4.7.0.css',
        'resources/css/external/select2.css'
    ], 'public/css/external/external.css')
    .sass('resources/sass/app.scss', 'public/css/app');



