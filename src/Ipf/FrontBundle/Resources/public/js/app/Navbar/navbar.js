var navbar = angular.module("navbar",[]);

navbar.controller("NavbarCtrl",['$rootScope', '$scope', function($rootScope, $scope){
        $rootScope.toggle = false;
        $scope.toggleAction = function(){
            if($rootScope.toggle === false){
                $rootScope.toggle = true;
            }
            else{
               $rootScope.toggle = false;
            }
        };
}]);