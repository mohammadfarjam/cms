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

// mix.styles([
// 'resources/admin/mix-css/font-awesome.min.css',
//     'resources/admin/mix-css/ionicons.min.css',
//     'resources/admin/mix-css/adminlte.min.css',
//     'resources/admin/mix-css/blue.css',
//     'resources/admin/mix-css/morris.css',
//     'resources/admin/mix-css/jquery-jvectormap-1.2.2.css',
//     'resources/admin/mix-css/datepicker3.css',
//     'resources/admin/mix-css/daterangepicker-bs3.css',
//     'resources/admin/mix-css/bootstrap3-wysihtml5.min.css',
//     'resources/admin/mix-css/d.css',
//     'resources/admin/mix-css/bootstrap-rtl.min.css',
//     'resources/admin/mix-css/custom-style.css',
//     'resources/admin/mix-css/style.css',
//     'resources/admin/mix-css/bootstrap4.3.1.css',
// ],'public/css/all.css');
//
// mix.js([
//    'resources/admin/mix-js/jquery.min.js',
//     'resources/admin/mix-js/jquery-ui.min.js',
//     'resources/admin/mix-js/bootstrap.bundle.min.js',
//      //'resources/admin/mix-js/raphael-min.js',
//     'resources/admin/mix-js/morris.min.js',
//      'resources/admin/mix-js/jquery.sparkline.min.js',
//      'resources/admin/mix-js/jquery-jvectormap-1.2.2.min.js',
//     'resources/admin/mix-js/jquery-jvectormap-world-mill-en.js',
//      'resources/admin/mix-js/jquery.knob.js',
//     //'resources/admin/mix-js/moment.min.js',
//      'resources/admin/mix-js/bootstrap-datepicker',
//      'resources/admin/mix-js/jquery.slimscroll.min.js',
//    'resources/admin/mix-js/fastclick.js',
//   'resources/admin/mix-js/adminlte.js',
//    'resources/admin/mix-js/dashboard.js',
//    //'resources/admin/mix-js/bootstrap3-wysihtml5.all.min.js',
//    'resources/admin/mix-js/bootstrap.min.js',
//    ],'public/js/all.js');
//
// mix.styles(['resources/admin/mix-css/dropzone.min.css'],'public/css/dropzone.css')
//     .scripts(['resources/admin/mix-js/dropzone.min.js'],'public/js/dropzone.js')

mix.styles(['resources/frontend/css/bootstrap.min.css',
    'resources/frontend/css/style.css'
], 'public/css/front_post_bootstrap.css')
    .scripts(['resources/frontend/js/bootstrap.bundle.min.js',
        'resources/frontend/js/jquery.min.js',
    ], 'public/js/front_jquery_post.js');

mix.copyDirectory('resources/fonts','public/font');
