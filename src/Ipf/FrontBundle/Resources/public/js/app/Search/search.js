var search = angular.module("search",['ngSanitize']);

search.controller("searchCtrl",function($http, $rootScope, $scope){
    
//    $rootScope.search.isCategory = false;
//    $rootScope.search.isTag = false;
    $rootScope.change = function(){
        
        console.log($rootScope.search.text);
        console.log($rootScope.search.isCategory);
        console.log($rootScope.search.isTag);
        
        var p = $.param({id: $rootScope.search.text, isCategory:$rootScope.search.isCategory, isTag:$rootScope.search.isTag});
        
        if($rootScope.search.text !== ""){

            var result = $http.post($rootScope.baseUri + "userproduct/search",p,{headers: {'Content-Type': 'application/x-www-form-urlencoded'}});

            result.success(function(data, status, headers, config){
                console.log(angular.fromJson(data));
                angular.forEach(angular.fromJson(data), function(value, key) {
                    if(key === "content"){
                        $scope.bonjour = value;
                    }
                });

    //            $scope.bonjour = angular.fromJson(data);
                $scope.isSearching = true;
            });
            result.error(function(data,status){
                $scope.isSearching = true;
            });
        }else{
            $scope.bonjour ="";
            $scope.isSearching = false;
        }
            
    };
});