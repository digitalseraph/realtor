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
    .copyDirectory('node_modules/font-awesome/fonts', 'public/assets/fonts')
    .copyDirectory('node_modules/ionicons/dist/fonts', 'public/assets/fonts')
    .copyDirectory('node_modules/admin-lte', 'public/assets/vendor/admin-lte')
    .copyDirectory('node_modules/admin-lte/dist/img', 'public/assets/vendor/admin-lte/img')
    .copyDirectory('node_modules/ckeditor', 'public/assets/vendor/ckeditor')
    .copy('node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css','public/assets/vendor/jvectormap')



    // Individual vendor scripts, styles, and assets
    .js('node_modules/jquery-sparkline/jquery.sparkline.js', 'public/assets/vendor/jquery-sparkline')
    .js('node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js', 'public/assets/vendor/jvectormap')
    .js('node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-usa-en.js', 'public/assets/vendor/jvectormap')
    .js('node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js', 'public/assets/vendor/jvectormap')
    .js('node_modules/chart.js/dist/Chart.js', 'public/assets/vendor/chart-js')


    /**********************************
     * Scripts
     **/
    
    // App Scripts
    .js('resources/assets/js/app.js', 'public/assets/js')
    .scripts([
        'public/assets/js/app.js'
    ], 'public/assets/js/all.js')

    // Admin Scripts
    .js('resources/assets/js/app-admin.js', 'public/assets/js')
    .js('resources/assets/js/dashboard-admin.js', 'public/assets/js')
    .scripts([
        'public/assets/js/app-admin.js',
        'node_modules/admin-lte/dist/js/adminlte.min.js',
        'node_modules/jquery-slimscroll/jquery.slimscroll.js',
        'node_modules/admin-lte/plugins/iCheck/icheck.js'
    ], 'public/assets/js/all-admin.js')
    // datatables
    .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs/js/dataTables.bootstrap.js'
    ], 'public/assets/js/datatables.js')




    /**********************************
     * Extract large libraries
     */
    .extract([
        'vue',
        'lodash',
        'jquery',
        'axios'
    ])

    /**********************************
     * Styles
     */
    
    // App Styles
    .sass('resources/assets/sass/app.scss', 'public/assets/css')
    .styles([
        'public/assets/css/app.css'
    ], 'public/assets/css/all.css')

    // Admin Styles
    .sass('resources/assets/sass/app-admin.scss', 'public/assets/css')
    .styles([
        'public/assets/css/app-admin.css'
    ], 'public/assets/css/all-admin.css')
    // datatables
    .styles([
        'node_modules/datatables.net-bs/css/dataTables.bootstrap.css'
    ], 'public/assets/css/datatables.css')


    /**********************************
     * Miscellaneous Configurations
     */
    .sourceMaps()
    .browserSync({
        files: [
            'public/css/*.css',
            'public/js/**/*.js',
            'resources/**/*.scss',
            'resources/views/**/*.blade.php',
            'resources/views/**/*.php',
            'app/**/*.php',
        ],
        proxy: process.env.APP_URL,
        logPrefix: "Laravel Mix BrowserSync - Admin",
        logConnections: true,
        reloadOnRestart: true,
        notify: true,
        open: false,
    })
    .version();
