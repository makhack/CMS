var cart = angular.module("cart",['ngAnimate']);

cart.controller("CartCtrl",['panier','$rootScope','$scope','$http',function(panier, $rootScope,$scope,$http){
    
    panier.setPanier().then(function(resolve){
        var isEmpty = true;
        var p = angular.fromJson(resolve);
        
        angular.forEach(p, function(value, key){
            isEmpty = false;
        });
        
        if(isEmpty){
            $scope.empty = "Veuillez remplir votre panier";
        }
                $scope.panier = p;
        },function(reject){
            
    });
    
    $scope.delete = function(id){
        
        panier.removeProduct(id);
        panier.setPanier().then(function(resolve){
            $scope.panier = angular.fromJson(resolve);
            console.log($scope.panier);
        },function(reject){
            
    });
    };
    
        
        
//    
//    var panier = $http.get($rootScope.baseUri + "cart/");
//    panier.success(function(data, status, headers, config) {
//        console.log(data = angular.fromJson(data));
//        $scope.panier = angular.fromJson(data);
//        console.log($scope.panier);
//    }).
//    error(function(data, status, headers, config) {
//        console.log("fail");
//    });
}]);