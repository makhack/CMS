var cart = angular.module("cart",['ngAnimate']);

cart.controller("CartCtrl",['$rootScope','$scope', function($rootScope,$scope){
    $rootScope.bonjour = " Hey salut !";
}]);