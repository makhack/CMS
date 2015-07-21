angular.module("ulysse",['cart','navbar'],
    function($interpolateProvider){
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });
