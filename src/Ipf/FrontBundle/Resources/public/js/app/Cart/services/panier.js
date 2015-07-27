var panier = angular.module("panier",[]);

panier.factory("panier", function($q,$http,$rootScope){
    
    var that = this;
    
    return {
        panier : [],
        setPanier : function(){
            var deferred = $q.defer();
            result = $http.get($rootScope.baseUri + "cart");
            result.success(function(data, status, headers, config){
                deferred.resolve(data);
            });
            result.error(function(data,status){
                deferred.reject(data);
            });
            return deferred.promise;
        },
        removeProduct : function(id){
            var deferred = $q.defer();
            result = $http.post($rootScope.baseUri + "cart/remove",id);
            result.success(function(data, status, headers, config){
                deferred.resolve(data);
            });
            result.error(function(data,status){
                deferred.reject(data);
            });
            return deferred.promise;
        }
    };
});