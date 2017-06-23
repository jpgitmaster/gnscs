'use strict';
var gnscsApp = angular.module('gnscsApp', ['ngSanitize', 'ngAnimate', 'ngResource', 'admnhdr', 'admncntnt']);

gnscsApp.directive('resizePage', function ($window, $timeout) {
    return function (scope, element) {
      var w = angular.element($window);
        scope.getWindowDimensions = function () {
            return {
                'h': w.height(),
                'w': w.width()
            };
        };
        scope.menu = true;
        scope.getPageSize = function(menu){
    		if(menu == false){
        		scope.menu = true;
        	}
        	if(menu == true){
        		scope.menu = false;
        	} 
        }

        scope.$watch(scope.getWindowDimensions, function (newValue, oldValue) {
            var get_height = newValue.h;
            var get_width = newValue.w;
            
            if(get_width > 992){
            	scope.menu = false;
            }else{
                scope.menu = true;
            }          
        }, true);

        w.bind('resize', function () {
            scope.$apply();
        });
    }
});
gnscsApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});
'use strict'; 
var admnhdr = angular.module('admnhdr', []);

admnhdr.controller('ctrlHeader', ['$scope', function($scope) {

}]);

