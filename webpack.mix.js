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
    'public/test/assets/layouts/layout/css/custom.min.css'
], 'public/css/all.css')
mix.scripts([
    //BEGIN CORE JQUERY PLUGINS
    'bower_components/jquery/dist/jquery.min.js',
    //'public/test/assets/global/plugins/bootstrap/js/bootstrap.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    //'public/test/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'node_modules/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    //'public/test/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'node_modules/jquery-slimscroll/jquery.slimscroll.min.js',
    //'public/test/assets/global/plugins/jquery.blockui.min.js',
    //'public/test/assets/global/plugins/js.cookie.min.js',
    //'public/test/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
    '/Users/guillermoallendes/Sites/fueguito2/node_modules/bootstrap-switch/dist/js/bootstrap-switch.min.js',
    //END CORE JQUERY PLUGINS
    //'public/js/vendor.js', 
    'bower_components/angular/angular.js',
    //'public/js/app.js',
    'bower_components/angular-cookies/angular-cookies.js',
    'bower_components/angular-translate/angular-translate.js',
    'bower_components/angular-translate-loader-static-files/angular-translate-loader-static-files.js',
    'bower_components/angular-translate-storage-cookie/angular-translate-storage-cookie.js',
    'bower_components/angular-translate-storage-local/angular-translate-storage-local.js',
    'bower_components/ngstorage/ngStorage.js',
    'bower_components/angular-ui-router/release/angular-ui-router.js',
    'bower_components/oclazyload/dist/ocLazyLoad.js',
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
    'resources/views/angular/interceptors/login.twig',
    //Services
    //'public/test1/services/user.js',
    ], 'public/js/all.js')
   //.sass('resources/assets/sass/app.scss', 'public/css')
    .version();
