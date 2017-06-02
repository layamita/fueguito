'use strict';

/**
 * Config for the router
 */
angular.module('app')
  .run(
    [          '$rootScope', '$state', '$stateParams', 
      function ($rootScope,   $state,   $stateParams) {
          $rootScope.$state         = $state;
          $rootScope.$stateParams   = $stateParams;
      }
     
    ]
  )
  .config(
    [          '$stateProvider', '$urlRouterProvider', 'JQ_CONFIG', 'MODULE_CONFIG', 
      function ($stateProvider,   $urlRouterProvider, JQ_CONFIG, MODULE_CONFIG) {
          var layout = "html/angular/app.html";
          //$urlRouterProvider.otherwise('/dashboard');
          var timestamp = '?timestamp='+Math.floor(Date.now() / 1000);
          $stateProvider
                .state('app', {
                  url: '',
                  templateUrl: layout,
                  //resolve: load( ['test2/ctrl/nav.js'] )
              })
              .state('app.dashboard', {
                  url: '/dashboard',
                  templateUrl: 'html/angular/dashboard.html',
                  //template:"<h1>lalalalal</h1>",
                  resolve: load(['js/angular/controllers/dashboard.js'+timestamp])
              })
             .state('layout', {
                  abstract: true,
                  url: '/layout',
                  templateUrl: 'tpl/layout.html'
              })
              .state('layout.fullwidth', {
                  url: '/fullwidth',
                  views: {
                      '': {
                          templateUrl: 'tpl/layout_fullwidth.html'
                      },
                      'footer': {
                          templateUrl: 'tpl/layout_footer_fullwidth.html'
                      }
                  },
                  resolve: load( ['js/controllers/vectormap.js'] )
              })
              .state('layout.mobile', {
                  url: '/mobile',
                  views: {
                      '': {
                          templateUrl: 'tpl/layout_mobile.html'
                      },
                      'footer': {
                          templateUrl: 'tpl/layout_footer_mobile.html'
                      }
                  }
              })
              .state('layout.app', {
                  url: '/app',
                  views: {
                      '': {
                          templateUrl: 'tpl/layout_app.html'
                      },
                      'footer': {
                          templateUrl: 'tpl/layout_footer_fullwidth.html'
                      }
                  },
                  resolve: load( ['js/controllers/tab.js'] )
              });

          function load(srcs, callback) {
            return {
                deps: ['$ocLazyLoad', '$q','$rootScope',
                  function( $ocLazyLoad, $q, $rootScope){
                    
                    var deferred    = $q.defer();
                    var promise     = false;
                    var name_path   = $rootScope.$$childTail.app.client.name_path || '../';
                    
                    srcs = angular.isArray(srcs) ? srcs : srcs.split(/\s+/);
                    if(!promise){
                      promise = deferred.promise;
                    }
                    angular.forEach(srcs, function(src) {
                        
                        src = src.replace('name_path', name_path);
                        console.log(src);
                        
                      promise = promise.then( function(){
                        if(JQ_CONFIG[src]){
                          return $ocLazyLoad.load(JQ_CONFIG[src]);
                        }
                        angular.forEach(MODULE_CONFIG, function(module) {
                          if( module.name == src){
                            name = module.name;
                          }else{
                            name = src;
                          }
                          
                        });
                        return $ocLazyLoad.load(name);
                      } );
                    });
                    deferred.resolve();
                    return callback ? promise.then(function(){ return callback(); }) : promise;
                }]
            }
          }
          
      }
    ]
  );
