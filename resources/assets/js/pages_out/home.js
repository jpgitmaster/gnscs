'use strict';
var gnscsApp = angular.module('gnscsApp', []);

gnscsApp.controller('ctrlHome', ['$scope', function($scope) {
    
}]);

gnscsApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});