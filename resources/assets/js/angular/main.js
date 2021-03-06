'use strict';

angular.module('app')
  .controller('AppCtrl', ['$scope', '$translate', '$localStorage', '$window',
    function(              $scope,   $translate,   $localStorage,   $window) {
      
      // add 'ie' classes to html
      var isIE = !!navigator.userAgent.match(/MSIE/i);
      
      isIE && angular.element($window.document.body).addClass('ie');
      isSmartDevice( $window ) && angular.element($window.document.body).addClass('smart');
      
      // config
      $scope.app = {
            grants:[],
            user:{
                    name:'',
                    logo:''
            },
            client:{
                    name:'',
                    logo:''
            },
            interaction:{
                            idPageList      :1,
                            idList          :0,
                            idPageSuscriber :1,
            },
            name: 'Glimmer',
            version: '2.0.2',
            // for chart colors
            color: {
              primary: '#7266ba',
              info:    '#23b7e5',
              success: '#27c24c',
              warning: '#fad733',
              danger:  '#f05050',
              light:   '#e8eff0',
              dark:    '#3a3f51',
              black:   '#1c2b36'
            },
            settings: {
              themeID: 1,
              navbarHeaderColor: 'bg-black',
              navbarCollapseColor: 'bg-white-only',
              asideColor: 'bg-black',
              headerFixed: true,
              asideFixed: false,
              asideFolded: false,
              asideDock: false,
              container: false,
               assetsPath: '../assets',
               globalPath: '../assets/global',
               layoutPath: '../assets/layouts/layout'
            },
            layout: {
                pageSidebarClosed: false, // sidebar menu state
                pageContentWhite: true, // set page content layout
                pageBodySolid: false, // solid body color state
                pageAutoScrollOnLoad: 1000 // auto scroll to top on page load
            },
      }
    
      // save settings to local storage
      if ( angular.isDefined($localStorage.settings) ) {
        $scope.app.settings = $localStorage.settings;
      } else {
        $localStorage.settings = $scope.app.settings;
      }
      $scope.$watch('app.settings', function(){
        if( $scope.app.settings.asideDock  &&  $scope.app.settings.asideFixed ){
          // aside dock and fixed must set the header fixed.
          $scope.app.settings.headerFixed = true;
        }
        // for box layout, add background image
        $scope.app.settings.container ? angular.element('html').addClass('bg') : angular.element('html').removeClass('bg');
        // save to local storage
        $localStorage.settings = $scope.app.settings;
      }, true);

      // angular translate
      $scope.lang = { isopen: false };
      $scope.langs = {en:'English', de_DE:'German', it_IT:'Italian'};
      $scope.selectLang = $scope.langs[$translate.proposedLanguage()] || "English";
      $scope.setLang = function(langKey, $event) {
        // set the current lang
        $scope.selectLang = $scope.langs[langKey];
        // You can change the language during runtime
        $translate.use(langKey);
        $scope.lang.isopen = !$scope.lang.isopen;
      };
      
      function isSmartDevice( $window )
      {
          // Adapted from http://www.detectmobilebrowsers.com
          var ua = $window['navigator']['userAgent'] || $window['navigator']['vendor'] || $window['opera'];
          // Checks for iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
          return (/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua);
      }
      
}]);
