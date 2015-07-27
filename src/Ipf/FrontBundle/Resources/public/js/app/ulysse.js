var ulysse = angular.module("ulysse",['cart','navbar','panier'],
    function($interpolateProvider){
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });
    
ulysse.run(function($rootScope){
    $rootScope.baseUri = "http://localhost/cms/web/app_dev.php/";
    
});