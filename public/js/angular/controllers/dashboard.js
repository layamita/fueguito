'use strict';

app.controller('DashboardCtrl', ['$scope', '$state', '$http',
                        function( $scope,   $state,   $http) {
    
    $scope.respRevenue           = {};
    $scope.respDashBox01         = {};
    $scope.respDashBox02             = {};
    $scope.respDashBox02.predicate   = 'date';
    $scope.respDashBox02.reverse     = true;
    $scope.updateGraph           = false;
    $scope.daterange             = null;
    $scope.idInterval            = 0;
    $scope.eachSelectDisable     = false;
    $scope.databases             = [];
    $scope.clients               = [];
    $scope.items                 = {};
    $scope.admin                 = false;
    
    $scope.resetRevenue = function(){
        $scope.respRevenue.element   = {'today':0, 'actual_month':0, 'last_month':0};
    }
    
    $scope.getRevenue = function(){
    
        var id_database = $scope.selectedDatabase   || null;
        var client      = $scope.selectedClient     || 0;
        
        $http.post('/api/dashrevenue/get', {id_database:id_database, client:client}).then(function (resp) {
            
            if(resp.data.vars.element){
            
                $scope.respRevenue.element       = resp.data.vars.element;
                $scope.respRevenue.result        = resp.data.result;
                $scope.respRevenue.message       = resp.data.vars.message;

            }
        });
    }
    
    $scope.resetBox01 = function(){
        
        $scope.respDashBox01.element = {date:"",total_deliveries:"0","total_openned":"0","total_bounces":"0","total_clicked":"0"};
        $scope.respDashBox01.element.porEnt = 0;
        $scope.respDashBox01.element.porB   = 0;
        $scope.respDashBox01.element.porAT  = 0;
        $scope.respDashBox01.element.porCT  = 0;
    }
    
    $scope.resetBox02 = function(){
        $scope.items.total = {
            payout      : 0,
            deliveries  : 0,
            openned     : 0,
            clicked     : 0,
            epc         : 0,
            epm         : 0
        }
    }
    
    $scope.resetRevenue();
    $scope.resetBox01();
    
    $scope.box01 = function(){
        
        //user.checkLogin();
        var id_database = $scope.selectedDatabase   || null;
        var date        = $scope.daterange          || null;
        var client      = $scope.selectedClient     ||  0;
        
        $http.post('/api/dashbox01/get', {client:client, id_database:id_database, date:date}).then(function (resp) {
            
            if(resp.data.vars.element){
            
                $scope.respDashBox01.element       = resp.data.vars.element;
                $scope.respDashBox01.result        = resp.data.result;
                $scope.respDashBox01.message       = resp.data.vars.message;

                $scope.respDashBox01.element.porEnt = (($scope.respDashBox01.element.total_deliveries*100)/$scope.respDashBox01.element.total_sends)    || 0;
                $scope.respDashBox01.element.porB   = (($scope.respDashBox01.element.total_bounces*100)/$scope.respDashBox01.element.total_sends)       || 0;
                $scope.respDashBox01.element.porAT  = (($scope.respDashBox01.element.total_openned*100)/$scope.respDashBox01.element.total_deliveries)  || 0;
                $scope.respDashBox01.element.porCT  = (($scope.respDashBox01.element.total_clicked*100)/$scope.respDashBox01.element.total_openned)     || 0;
                $scope.respDashBox01.element.porConv= (($scope.respDashBox01.element.total_conversion*100)/$scope.respDashBox01.element.total_clicked)  || 0;
                
                
                $scope.updateGraph                 = true;
            }else{
                $scope.resetBox01();
                $scope.updateGraph                 = true;
            }
        });
        
    
    };
    
    $scope.box02 = function(){
        
        var date        = $scope.daterangeBox02     || null;
        var id_database = $scope.selectedDatabase   || null;
        var client      = $scope.selectedClient     ||  0;
        
        $scope.resetBox02();
        $http.post('/api/dashbox02/get', {date:date, id_database:id_database, client:client}).then(function (resp) {
        
            $scope.items.total.payout          = 0;
            $scope.items.total.deliveries      = 0;
            $scope.items.total.openned         = 0;
            $scope.items.total.clicked         = 0;
            $scope.items.total.ctr             = 0;
            $scope.items.total.epc             = 0;
            $scope.items.total.epm             = 0;
            $scope.respDashBox02.elements      = resp.data.vars;
            $scope.respDashBox02.result        = resp.data.result;
            $scope.respDashBox02.message       = resp.data.vars.message;
        });
    
    };
    
    if($scope.admin){
    
        $scope.getClients = function(){
    
            $http.post('/api/dashbox01/clients').then(function (resp) {
                if(resp.data.vars.elements.length){
                    $scope.clients.push({'name':'Select Database',id_client:'no'});
                    $scope.clients = $scope.clients.concat(resp.data.vars.elements);
                    $scope.selectedDatabase = 'no';
                }
            });
        }
        $scope.getClients();
    }
    
    $scope.getDatabases = function(){
    
        var date        = $scope.daterange;
        var client      = $scope.selectedClient || 0;
        
        $http.post('/api/dashbox01/databases', {date:date, client:client}).then(function (resp) {
            if(resp.data.vars.elements.length){
                $scope.databases = [];
                $scope.databases.push({'name':'Select Database',id_database:'no'});
                $scope.databases.push({'name':'All',id_database:0});
                $scope.databases = $scope.databases.concat(resp.data.vars.elements);
                $scope.selectedCampaign = 'no';
            }
        });
    }
    
    $scope.changeDate = function(){
        $scope.updateGraph   = false;
        if($scope.selectedDatabase != 'no'){
            //$scope.resetBox01();
            //$scope.getRevenue();
            $scope.box01();
        }
    }
    
    $scope.changeDatabase = function(){
        $scope.updateGraph   = false;
        if($scope.selectedDatabase != 'no'){
            //$scope.resetBox01();
            $scope.getRevenue();
            $scope.box01();
            $scope.box02();
        }
    }
    
    $scope.changeClient = function(){
        if($scope.selectedClient != 'no'){
           $scope.getDatabases();
        }
    }
    
    
    $scope.refresh = function(){
        $scope.updateGraph = false;
        $scope.box01();
        setTimeout(function(){
            $('#refresh').toggleClass("active");
        },1500);
    }
    
    $scope.refreshEach = function(lapseTime, txt){
        
        clearInterval($scope.idInterval);
        $scope.idInterval = setInterval(function(){
            $scope.updateGraph = false;
            $scope.box01();
        },(lapseTime*1000));
        $('#eachTxt').html('Actualizar cada: '+txt);
        
    }
    
    $scope.eachEnable = function(){
    
        if(!$scope.eachSelectDisable){
            $scope.eachSelectDisable = true;
        }else{
            $('#eachTxt').html('Actualizar cada: ');
            $scope.eachSelectDisable = false;
            clearInterval($scope.idInterval);
        }
    
    }
    
    $scope.changeDateBox02 = function(){
        $scope.box02();
    }
    
    $scope.getRevenue();
    $scope.getDatabases();
    $scope.box01();
    $scope.box02();
    
    
    
}]);