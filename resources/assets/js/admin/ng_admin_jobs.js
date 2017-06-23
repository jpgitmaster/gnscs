'use strict'; 
var admncntnt = angular.module('admncntnt', ['ui.mask', 'ui.bootstrap', 'summernote']);


admncntnt.controller('ctrlContent', ['$scope', function($scope) {
    $scope.summernote_options = {
        toolbar: [
                ['edit',['undo','redo']],
                ['style', ['bold', 'italic', 'underline']],
                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]
                
            ]
    };
    $scope.open_calendar = function($event, index, datepicker){
        $scope[datepicker] = {}; $scope[datepicker].open = {};
        $event.preventDefault();
        $event.stopPropagation();
        $scope[datepicker].open[index] = !$scope[datepicker].open[index];
    }
    $scope.NoWeeks = {
        showWeeks: false
    };

    $scope.createJob = function(){
        $('#createJob').appendTo('body').modal().velocity('transition.flipXIn');
    }
}]);