const { mix } = require('laravel-mix');

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
mix.copy('resources/views/angular/blocks', 'public/html/angular',  false)
mix.styles([
    'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
    'public/test/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    //'public/test/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
    'node_modules/bootstrap-switch/dist/css/bootstrap2/bootstrap-switch.min.css',
    'public/test/assets/global/css/components.min.css',
    'public/test/assets/global/css/plugins.min.css',
    'public/test/assets/layouts/layout/css/layout.min.css',
    'public/test/assets/layouts/layout/css/themes/darkblue.min.css',
    'public/test/assets/layouts/layout/css/custom.min.css',
    'node_modules/angular-material/angular-material.min.css',
    'node_modules/angularjs-toaster/toaster.min.css'
], 'public/css/all.css')
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.scripts([
    //BEGIN CORE JQUERY PLUGINS
    'bower_components/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'public/test/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    //END CORE JQUERY PLUGINS
    //'public/js/vendor.js',
    'node_modules/angular/angular.min.js',
    'node_modules/angular-animate/angular-animate.min.js',
    'node_modules/angular-aria/angular-aria.min.js',
    'node_modules/angular-material/angular-material.min.js',
    'node_modules/angularjs-toaster/toaster.js',
    'bower_components/angular-cookies/angular-cookies.js',
    'node_modules/angular-translate/dist/angular-translate.js',
    'node_modules/angular-translate/dist/angular-translate-loader-static-files/angular-translate-loader-static-files.js',
    'node_modules/angular-translate/dist/angular-translate-storage-cookie/angular-translate-storage-cookie.js',
    'node_modules/angular-translate/dist/angular-translate-storage-local/angular-translate-storage-local.js',
    
    'bower_components/ngstorage/ngStorage.js',
    'node_modules/angular-ui-router/release/angular-ui-router.min.js',
    'bower_components/oclazyload/dist/ocLazyLoad.js',
    'node_modules/underscore/underscore-min.js',
    'node_modules/restangular/dist/restangular.js',
    'public/test/assets/global/plugins/angularjs/plugins/ui-bootstrap-tpls.min.js',
    //BEGIN APP LEVEL JQUERY SCRIPTS
    'public/test/assets/global/scripts/app.js',
    'public/test/assets/layouts/layout/scripts/layout.js',
    'public/test/assets/layouts/global/scripts/quick-sidebar.js',
    'public/test/assets/layouts/global/scripts/quick-nav.js',
    //'public/test/assets/layouts/layout/scripts/demo.js', //Puede que se pueda quitar
    //Modulos
    'resources/views/angular/app.twig',
    //Directives
    'resources/views/angular/directives/directives.twig',
    'resources/views/angular/config/router.twig',
    'resources/views/angular/config/config.twig',
    'resources/views/angular/main.twig', 
    'resources/views/angular/config/lazyload.twig',
    //Controllers
    'resources/views/angular/controllers/controllers.twig',
    //Interceptors
    //Services
    'resources/views/angular/services/api.twig',
    ], 'public/js/all.js')
   //.sass('resources/assets/sass/app.scss', 'public/css')
    .version();
