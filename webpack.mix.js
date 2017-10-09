let mix = require('laravel-mix');

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

require('dotenv').config();

mix
    /**
     * Copy Assets
     */
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .copy('node_modules/admin-lte/dist/img', 'public/assets/vendor/admin-lte/img')

    /**
     * Scripts
     */
    // App Scripts
    .js('resources/assets/js/app.js', 'public/js')
    .scripts([
        'public/js/app.js'
    ], 'public/js/all.js')
    // Admin Scripts
    .js('resources/assets/js/app-admin.js', 'public/js')
    .scripts([
        'public/js/app-admin.js',
        'node_modules/admin-lte/dist/js/adminlte.min.js',
        'node_modules/admin-lte/plugins/iCheck/icheck.min.js'
    ], 'public/js/all-admin.js')

    .extract(['vue'])

    /**
     * Styles
     */
    // App Styles
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        'public/css/app.css'
    ], 'public/css/all.css')
    // Admin Styles
    .sass('resources/assets/sass/app-admin.scss', 'public/css')
    .styles([
        'public/css/app-admin.css',
        'node_modules/admin-lte/plugins/iCheck/all.css'
    ], 'public/css/all-admin.css')

    /**
     * Miscellaneous Configurations
     */
    .browserSync({
    proxy: process.env.APP_URL
    })
    .sourceMaps()
    .version();
