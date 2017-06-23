'use strict';
var gnscsApp = angular.module('gnscsApp', []);

gnscsApp.controller('ctrlContactus', ['$scope', function($scope) {
    
}]);

gnscsApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});