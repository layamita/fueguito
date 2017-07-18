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
    'node_modules/bootstrap-switch/dist/css/bootstrap2/bootstrap-switch.min.css',
    'public/assets/global/css/components.min.css',
    'public/assets/global/css/plugins.min.css',
    'public/assets/layout/layout/css/layout.min.css',
    'public/assets/layout/layout/css/themes/darkblue.min.css',
    'node_modules/angular-material/angular-material.min.css',
    'node_modules/angularjs-toaster/toaster.min.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
], 'public/css/all.css')
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.scripts([
    //BEGIN CORE JQUERY PLUGINS
    'bower_components/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'node_modules/select2/dist/js/select2.full.js',
    //END CORE JQUERY PLUGINS
    //'public/js/vendor.js',
    'node_modules/angular/angular.js',
    'node_modules/angular-route/angular-route.js',
    'node_modules/angular-resource/angular-resource.js',
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
    'public/assets/global/scripts/app.js',
    'public/assets/layout/layout/scripts/layout.js',
    'public/assets/layout/global/scripts/quick-sidebar.min.js',
    'public/assets/layout/global/scripts/quick-nav.min.js',
    //Alta Módulo principal
    'resources/views/angular/app.twig',
    //Services - Constants
    'resources/views/angular/services/constanst/constantsApi.twig',
    'resources/views/angular/services/constanst/constanstUrls.twig',
    'resources/views/angular/services/constanst/constantsApp.twig',
    //Services - Services
    ////'resources/views/angular/services/services/api.twig',
    //Services - Services - Models
    'resources/views/angular/services/services/models/user.twig',
    //Services - Providers
    'resources/views/angular/services/provider/callApi.twig',
    //Config
    'resources/views/angular/config/router.twig',
    'resources/views/angular/config/config.twig',
    'resources/views/angular/config/lazyload.twig',
    'resources/views/angular/config/configApi.twig',
    //Directives
    'resources/views/angular/directives/directives.twig',
    'resources/views/angular/directives/selectHttp/js/selectHttp.twig',
    //Interceptors
    
    //Controllers
    'resources/views/angular/controllers/main.twig', 
    'resources/views/angular/controllers/controllers.twig',
    ], 'public/js/all.js')
   //.sass('resources/assets/sass/app.scss', 'public/css')
    .version();
