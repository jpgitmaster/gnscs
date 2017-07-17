'use strict';
var gnscsApp = angular.module('gnscsApp', ['ngResource']);

gnscsApp.controller('ctrlCareers', ['$scope', '$http', '$timeout',
    function($scope, $http, $timeout) {
    $scope.msg = [];
    $scope.form = {
        'resume_attachment': true,
        'personal_info': false,
        'educ_bg': false,
        'emphistory': false,
        'char_reference': false
    };
    var frm = 0;
    $scope.loader1 = false;
    $scope.loader2 = false;
    $scope.loader3 = false;
    $scope.loader4 = false;
    $scope.loader5 = false;

    $scope.usrApply = function(fls, usr, edcs, emps, chrs){
        $http({
            method: 'POST',
            url: "careers/user_apply",
            headers: { 'Content-Type': undefined },
            data: {files: fls, user : usr, edcs : edcs, emps : emps, chrs : chrs, form: frm},
            transformRequest: function (data) {
                var fd = new FormData();
                fd.append('form', angular.toJson(data.form));
                if(frm == 0 || (frm == 0 && $scope.msg['has_error'] == true)){
                    $scope.loader1 = true;
                    angular.forEach(data.files, function(file){
                       fd.append('file', file);
                    });
                }
                return fd;
            }
        }).then(function(result){
            $scope.msg = result.data;
            switch($scope.msg['success'] + "|" + $scope.msg['has_error']){
                case 0 + "|" + false:
                    $scope.form['personal_info'] = true;
                    $scope.msg['completed_message'] = 'Uploading resume is now completed!';
                    frm++;
                    $timeout(function() {
                        $scope.loader1 = false;
                        $scope.collapseTab(2);
                    }, 200);
                    break;
            }
            if($scope.msg['has_error'] == true){
                $timeout(function() {
                    $scope.loader1 = false;
                    $scope.loader2 = false;
                    $scope.loader3 = false;
                    $scope.loader4 = false;
                    $scope.loader5 = false;
                }, 200);
            }
            console.log($scope.msg);
        });
    };

    angular.element('#accordion .panel:nth-child(1) .panel-collapse').collapse('show');
    angular.element('#accordion .panel .panel-title').addClass('collapsed');
    angular.element('#accordion .panel:nth-child(1) .panel-title').removeClass('collapsed');
    angular.element('#accordion .panel .panel-collapse').addClass('collapse').collapse('hide');
    var current_num = 1;

    $scope.collapseTab = function(num){
        if(!angular.element('#accordion .panel:nth-child('+num+')').hasClass('disabled')){
            angular.element('#accordion .panel .panel-collapse').collapse('hide');
            angular.element('#accordion .panel:nth-child('+num+') .panel-collapse').collapse('show');
            
            if(current_num == num){
                angular.element('#accordion .panel:nth-child('+num+') .panel-title').toggleClass('collapsed');
            }else{
                angular.element('#accordion .panel .panel-title').addClass('collapsed');
                angular.element('#accordion .panel:nth-child('+num+') .panel-title').toggleClass('collapsed');
            }
            current_num = num;
        }
    }
}]);

gnscsApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});


gnscsApp.directive('fileInput', ['$parse', function($parse){
    return {
        restrict: 'A',
        link: function(scope, elm, attrs){
            elm.bind('change', function(){
                var cv = elm[0].files;
                scope.resume_name = cv[0].name;
                $parse(attrs.fileInput).assign(scope, cv);
                scope.$apply();
            });
        }
    }
}]);