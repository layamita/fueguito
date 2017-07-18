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
    <link rel="stylesheet" href="{{ mix('/css/all.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    
</head>

<body ng-controller="MainCtrl" class="page-header-fixed page-sidebar-closed-hide-logo page-on-load" ng-class="{'page-container-bg-solid': app.settings.layout.pageBodySolid, 'page-sidebar-closed': app.settings.layout.pageSidebarClosed}">
    <div ui-view></div>
    <script src="{{ mix('js/all.js') }}"></script>
</body>
</html>
