<!doctype html>
<html data-ng-app="app" ng-strict-di>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Angular Material Starter</title>

    <meta name="theme-color" content="#0690B7">

    <!--[if lte IE 10]>
    <script type="text/javascript">document.location.href = '/unsupported-browser'</script>
    <![endif]-->
    
    <link href="test/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="test/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="test/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="test/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="test/assets/global/css/components.min.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="test/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="test/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="test/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="test/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    
    
</head>

<body ng-controller="AppCtrl" class="page-header-fixed page-sidebar-closed-hide-logo page-on-load" ng-class="{'page-container-bg-solid': app.settings.layout.pageBodySolid, 'page-sidebar-closed': app.settings.layout.pageSidebarClosed}">
    <div ui-view></div>
    <script>
    <script src="" type="text/javascript"></script>

        <script src="test/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        
        <script src="test/bower_components/angular/angular.js" type="text/javascript"></script>
        <script src="test/bower_components/angular-cookies/angular-cookies.js" type="text/javascript"></script>
        <script src="test/bower_components/angular-translate/angular-translate.js" type="text/javascript"></script>
        <script src="test/bower_components/angular-translate-loader-static-files/angular-translate-loader-static-files.js" type="text/javascript"></script>
        <script src="test/bower_components/angular-translate-storage-cookie/angular-translate-storage-cookie.js" type="text/javascript"></script>
        <script src="test/bower_components/angular-translate-storage-local/angular-translate-storage-local.js" type="text/javascript"></script>
        <script src="test/bower_components/ngstorage/ngStorage.js" type="text/javascript"></script>
        <script src="test/bower_components/angular-ui-router/release/angular-ui-router.js" type="text/javascript"></script>
        <script src="test/bower_components/oclazyload/dist/ocLazyLoad.js" type="text/javascript"></script>
        <script src="test/assets/global/plugins/angularjs/plugins/ui-bootstrap-tpls.min.js" type="text/javascript"></script>

        <script src="test/assets/global/scripts/app.js" type="text/javascript"></script>
        <script src="test/assets/layouts/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="test/assets/layouts/global/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="test/assets/layouts/global/scripts/quick-nav.js" type="text/javascript"></script>
        
        <!--Modulos-->
        <script src="test/app.js" type="text/javascript"></script>
        <!--Directives-->
        <script src="test/directives/directives.js" type="text/javascript"></script>
        <!--Controllers-->
        <script src="test/controllers/controllers.js" type="text/javascript"></script>
        <!--Services-->
        <script src="test/config.router.js" type="text/javascript"></script>
        <script src="test/config.js" type="text/javascript"></script>
        <script src="test/main.js" type="text/javascript"></script> 
        <script src="test/config.lazyload.js" type="text/javascript"></script>
</body>
</html>
