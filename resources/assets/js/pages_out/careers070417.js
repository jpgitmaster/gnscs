'use strict';
var gnscsApp = angular.module('gnscsApp', ['ngSanitize', 'ngResource', 'ngAnimate', 'ui.mask', 'ui.bootstrap', 'summernote']);

gnscsApp.controller('ctrlCareers', ['$scope', '$http', '$timeout', '$filter', 'uibDateParser',
    function($scope, $http, $timeout, $filter, uibDateParser) {

    $scope.viewResume = function(){
        $('#resume_tpl').appendTo('body').modal().velocity('transition.flipXIn');
    }
    $scope.jbpositions = [
        {id: 1, name: 'RN Supervisors', selected: false},
        {id: 2, name: 'Licensed Speech Therapists', selected: false},
        {id: 3, name: 'Physical Therapy Assistants', selected: false},
        {id: 4, name: 'Occupational Therapy Assistants', selected: false},
        {id: 5, name: 'Certified Nursing Assistants', selected: false},
        {id: 6, name: 'Licensed Occupational Therapists', selected: false},
        {id: 7, name: 'Licensed Physical Therapists', selected: false},
        {id: 8, name: 'Registered Nurses', selected: false},
        {id: 9, name: 'Licensed Practical Nurses', selected: false}
    ];

    $scope.selection = [];

    $scope.selectedPositions = function selectedPositions() {
        return filterFilter($scope.jbpositions, { selected: true });
    };
    // Watch positions for changes
    $scope.slctjbs = [];
    $scope.$watch('jbpositions|filter:{selected:true}', function (nv) {
        $scope.selection = nv.map(function (jb) {
          return jb.id;
        });
        $scope.slctjbs = $scope.selection;
    }, true);

    $scope.user = [];
    $scope.is_open = {date1: false, date2: false};
    $scope.open = function($event, opened, bday) {
        $event.preventDefault();
        $event.stopPropagation();
        $scope.is_open[opened] = true;
    };

    $scope.BirthDate = {
        showWeeks: false,
        initDate: new Date('2002', '00', '01'),
        maxDate: new Date('2002', '00', '01')
    };

    $scope.dateOptions = {
        showWeeks: false
    };
    $scope.MinDate = {
        showWeeks: false,
        minDate: new Date()
    };
    $scope.open_calendar = function($event, index, datepicker){
        $scope[datepicker] = {}; $scope[datepicker].open = {};
        $event.preventDefault();
        $event.stopPropagation();
        $scope[datepicker].open[index] = !$scope[datepicker].open[index];
    }

    $scope.MaxCurrentDate = {
        showWeeks: false,
        maxDate: new Date()
    };
    $scope.NoWeeks = {
        showWeeks: false
    };

    $scope.edcs = [{
        'educ_type'     : "",
        'school'        : "",
        'startdate'     : "",
        'enddate'       : "",
        'course'        : "",
        'awrdsnrcgntn'  : "<ul><li></li></ul>"
    }];
    $scope.addEdc = function(edc){
        $scope.edcs.unshift({
            'educ_type'     : "",
            'school'        : "",
            'startdate'     : "",
            'enddate'       : "",
            'course'        : "",
            'awrdsnrcgntn'  : "<ul><li></li></ul>"
        });
        if(typeof $scope.msg['error']['edc'] != "undefined"){
            $scope.msg['error']['edc'].splice(0, 0, {});
        }
    };

    $scope.emps = [{
        'company'        : "",
        'position'       : "",
        'salary'         : "",
        'sdate'          : "",
        'edate'          : "",
        'supname'        : "",
        'canwecontact'   : "",
        'empphone'       : "",
        'empmobile'      : "",
        'empemail'       : "",
        'jbdscrptn'      : "<ul><li></li></ul>",
        'rsnfrlvng'      : "<ul><li></li></ul>",
        'ispresent'      : ""
    }];
    $scope.addEmp = function(emp){
        $scope.emps.unshift({
            'company'        : "",
            'position'       : "",
            'salary'         : "",
            'sdate'          : "",
            'edate'          : "",
            'supname'        : "",
            'canwecontact'   : "",
            'empphone'       : "",
            'empmobile'      : "",
            'empemail'       : "",
            'empskype'       : "",
            'empviber'       : "",
            'empym'          : "",
            'jbdscrptn'      : "<ul><li></li></ul>",
            'rsnfrlvng'      : "<ul><li></li></ul>",
            'ispresent'      : ""
        });
        if(typeof $scope.msg['error']['emp'] != "undefined"){
            $scope.msg['error']['emp'].splice(0, 0, {});
        }
    };
    

    $scope.chrs = [{
        'chrname'        : "",
        'chrrelation'    : "",
        'chremployer'    : "",
        'chrposition'    : "",
        'contctby'       : "",
        'chremail'       : "",
        'chrphone'       : "",
        'chrmobile'      : "",
        'chrskype'       : "",
        'chrviber'       : "",
        'chrym'          : ""
    }];
    $scope.addChr = function(chr){
        $scope.chrs.unshift({
            'chrname'        : "",
            'chrrelation'    : "",
            'chremployer'    : "",
            'chrposition'    : "",
            'contctby'       : "",
            'chremail'       : "",
            'chrphone'       : "",
            'chrmobile'      : "",
            'chrskype'       : "",
            'chrviber'       : "",
            'chrym'          : ""
        });
        if(typeof $scope.msg['error']['chr'] != "undefined"){
            $scope.msg['error']['chr'].splice(0, 0, {});
        }
    };

    $scope.removeEdc = function(edc){
        var index = $scope.edcs.indexOf(edc);
        $scope.edcs.splice(index, 1);
        $scope.msg['error']['edc'].splice(index, index, {});
    }
    $scope.removeEmp = function(emp){
        var index = $scope.emps.indexOf(emp);
        $scope.emps.splice(index, 1);
        $scope.msg['error']['emp'].splice(index, index, {});
    }
    $scope.removeChr = function(chr){
        var index = $scope.chrs.indexOf(chr);
        $scope.chrs.splice(index, 1);
        $scope.msg['error']['chr'].splice(index, index, {});
    }
    $scope.checked = 0;
    $scope.clearEndate = function(index, ispresent){
        if(ispresent == 1){
            $scope.emps[index].empedate = '';
            $scope.checked++;
        }else{
            $scope.checked--;
        }
    }

    $scope.msg = [];
    $scope.form = {
        'position_applying': true,
        'resume_attachment': false,
        'personal_info': false,
        'educ_bg': false,
        'emphistory': false,
        'char_reference': false
    };

    $scope.summernote_options = {
        toolbar: [
                ['edit',['undo','redo']],
                ['style', ['bold', 'italic', 'underline']],
                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]
                
            ]
    };
    $scope.makeSameAddress = function(check, address1){
        if(check == true){
            $scope.usr.address2 = angular.copy(address1);
        }
    }

    var frm = 0;
    $scope.loader1 = false;
    $scope.loader2 = false;
    $scope.loader3 = false;
    $scope.loader4 = false;
    $scope.loader5 = false;
    $scope.loader6 = false;
    $scope.usrApply = function(slctn, fls, usr, edcs, emps, chrs){
        $http({
            method: 'POST',
            url: "careers/user_apply",
            headers: { 'Content-Type': undefined },
            data: {slctn: slctn, files: fls, user : usr, edcs : edcs, emps : emps, chrs : chrs, form: frm},
            transformRequest: function (data) {
                var fd = new FormData();
                fd.append('form', angular.toJson(data.form));
                if(frm == 0 || (frm == 0 && $scope.msg['has_error'] == true)){
                    $scope.loader1 = true;
                    fd.append('slctn', data.slctn);
                }
                else if(frm == 1 || (frm == 1 && $scope.msg['has_error'] == true)){
                    $scope.loader2 = true;
                    angular.forEach(data.files, function(file){
                       fd.append('file', file);
                    });
                }
                else if(frm == 2 || (frm == 2 && $scope.msg['has_error'] == true)){
                    $scope.loader3 = true;
                    fd.append('user', angular.toJson(data.user));
                }
                else if(frm == 3 || (frm == 3 && $scope.msg['has_error'] == true)){
                    $scope.loader4 = true;
                    fd.append('edcs', angular.toJson(data.edcs));
                }
                else if(frm == 4 || (frm == 4 && $scope.msg['has_error'] == true)){
                    $scope.loader5 = true;
                    fd.append('user', angular.toJson(data.user));
                    fd.append('emps', angular.toJson(data.emps));
                }
                else if(frm == 5 || (frm == 5 && $scope.msg['has_error'] == true)){
                    $scope.loader6 = true;
                    fd.append('slctn', data.slctn);
                    fd.append('user', angular.toJson(data.user));
                    fd.append('edcs', angular.toJson(data.edcs));
                    fd.append('emps', angular.toJson(data.emps));
                    angular.forEach(data.files, function(file){
                       fd.append('file', file);
                    });
                    fd.append('chrs', angular.toJson(data.chrs));
                }
                return fd;
            }
        }).then(function(result){
            $scope.msg = result.data;
            switch($scope.msg['success'] + "|" + $scope.msg['has_error']){
                case 0 + "|" + false:
                    $scope.form['resume_attachment'] = true;
                    $scope.msg['completed_message'] = 'Job positions already selected!';
                    frm++;
                    $timeout(function() {
                        $scope.loader1 = false;
                        $scope.collapseTab(2);
                    }, 200);
                    break;
                case 1 + "|" + false:
                    $scope.form['personal_info'] = true;
                    $scope.msg['completed_message'] = 'Uploading resume is now completed!';
                    frm++;
                    $timeout(function() {
                        $scope.loader2 = false;
                        $scope.collapseTab(3);
                    }, 200);
                    break;
                case 2 + "|" + false:
                    $scope.form['educ_bg'] = true;
                    $scope.msg['completed_message'] = 'Personal Information is now completed!';
                    frm++;
                    $timeout(function() {
                        $scope.loader3 = false;
                        $scope.collapseTab(4);
                    }, 200);
                    break;
                case 3 + "|" + false:
                    $scope.form['emphistory'] = true;
                    $scope.msg['completed_message'] = 'Educational Background is now completed!';
                    frm++;
                    $timeout(function() {
                        $scope.loader4 = false;
                        $scope.collapseTab(5);
                    }, 200);
                    break;
                case 4 + "|" + false:
                    $scope.form['char_reference'] = true;
                    $scope.msg['completed_message'] = 'Employment History is now completed!';
                    frm++;
                    $timeout(function() {
                        $scope.loader5 = false;
                        $scope.collapseTab(6);
                    }, 200);
                    break;
                case 5 + "|" + false:
                    $scope.loader6 = false;
                    $scope.msg['completed_message'] = 'COMPLETED ALL';
                    break;
            }
            if($scope.msg['has_error'] == true){
                $timeout(function() {
                    $scope.loader1 = false;
                    $scope.loader2 = false;
                    $scope.loader3 = false;
                    $scope.loader4 = false;
                    $scope.loader5 = false;
                    $scope.loader6 = false;
                }, 200);
            }
            if($scope.loader6 == false && $scope.msg['complete_all'] == true){
                angular.element('#completeMdl').modal('show');
                $scope.files = {};
                angular.element('.upload').val('');
                $scope.selection = [];
                
                $scope.usr = {};
                $scope.edcs = [{
                    'educ_type'     : "",
                    'school'        : "",
                    'startdate'     : "",
                    'enddate'       : "",
                    'course'        : "",
                    'awrdsnrcgntn'  : "<ul><li></li></ul>"
                }];
                $scope.emps = [{
                    'company'        : "",
                    'position'       : "",
                    'salary'         : "",
                    'sdate'          : "",
                    'edate'          : "",
                    'supname'        : "",
                    'canwecontact'   : "",
                    'empphone'       : "",
                    'empmobile'      : "",
                    'empemail'       : "",
                    'jbdscrptn'      : "<ul><li></li></ul>",
                    'rsnfrlvng'      : "<ul><li></li></ul>",
                    'ispresent'      : ""
                }];
                $scope.chrs = [{
                    'chrname'        : "",
                    'chrrelation'    : "",
                    'chremployer'    : "",
                    'chrposition'    : "",
                    'contctby'       : "",
                    'chremail'       : "",
                    'chrphone'       : "",
                    'chrmobile'      : "",
                    'chrskype'       : "",
                    'chrviber'       : "",
                    'chrym'          : ""
                }];
                $scope.collapseTab(1);
            }
            console.log($scope.msg);
        });
    }

    $scope.getAge = function(bday){
        var current_date    = new Date();

        var current_yr          = current_date.getFullYear();
        var current_mo          = current_date.getMonth();

        var bdate           = bday;
        var bdate_yr        = bdate.getFullYear();
        var bdate_mo        = bdate.getMonth();
        var your_yr         = current_yr - bdate_yr;
        var your_mo         = current_mo - bdate_mo;
        if(your_mo < 0 || (your_mo === 0 && current_date.getDate() < bdate.getDate())){
            your_yr--;
        }

        $scope.usr.age = your_yr;
    }

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

    $scope.removeEmperrors = function(exp, empslength){
        if(exp == 1){
            for (var i = 0; i < empslength; i++) {
                $scope.msg['error']['emp']       = [];
                $scope.msg['error']['emp'][i]    = [];
                if($scope.msg['error']['emp'][i]['error']){
                    $scope.msg['error']['emp'][i]['error'] = "";
                }
                $scope.emps[i] = {};
            }
        }
    }

    $scope.gender = [
        {id: 1, name: 'Female'},
        {id: 2, name: 'Male'}
    ];

    $scope.cstatus = [
        {id: 1, name: 'Single'},
        {id: 2, name: 'Married'},
        {id: 3, name: 'Legally separated'},
        {id: 4, name: 'Annulled'},
        {id: 5, name: 'Widow'},
        {id: 6, name: 'Widower'}
    ];

    $scope.typework = [
        {id: 1, name: 'Full-Time'},
        {id: 2, name: 'Part-Time'},
        {id: 3, name: 'Freelance'},
        {id: 4, name: 'Contractual'},
        {id: 5, name: 'Work from Home'},
        {id: 6, name: 'Project Base'},
        {id: 7, name: 'Temporary'}
    ];

    $scope.edctypes = [
        {id: 1, name: 'High School'},
        {id: 2, name: 'College'},
        {id: 3, name: 'Vocational'},
        {id: 4, name: 'Others'}
    ];

    $scope.yrsxprncs = [
        {id: 1, name: 'No Work Experience'},
        {id: 2, name: '1-3 Yrs. of Experience'},
        {id: 3, name: '4-6 Yrs. of Experience'},
        {id: 4, name: '7 yrs. and Above'}
    ];

    $scope.cntctbys = [
        {id: 1, name: 'Email'},
        {id: 2, name: 'Phone No.'},
        {id: 3, name: 'Mobile No.'},
        {id: 4, name: 'Skype'},
        {id: 5, name: 'Viber'},
        {id: 6, name: 'Yahoo Messenger'}
    ];

    $scope.currencies = [
        { id: 1, name: 'USD $' },
        { id: 2, name: 'Php ₱' }
    ];

    // $scope.get_yrsxprncs = function(usrid){
    //     return $filter('filter')($scope.yrsxprncs, {id: usrid})[0].name;
    // }
    
    // $scope.get_work = function(usrid){
    //     return $filter('filter')($scope.typework, {id: usrid})[0].name;
    // }

    // $scope.get_gender = function(usrid){
    //     return $filter('filter')($scope.gender, {id: usrid})[0].name;
    // }

    // $scope.get_cstatus = function(usrid){
    //     return $filter('filter')($scope.cstatus, {id: usrid})[0].name;
    // }

    $scope.get_selection = function(arr, arr_id){
        return $filter('filter')(arr, {id: arr_id})[0].name;
    }
}]);

gnscsApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});

gnscsApp.directive('onlyDigits', function () {
    return {
      require: 'ngModel',
      restrict: 'A',
      link: function (scope, element, attr, ctrl) {
        function inputValue(val) {
          if (val) {
            var digits = val.replace(/[^0-9.]/g, '');

            if (digits.split('.').length > 2) {
              digits = digits.substring(0, digits.length - 1);
            }

            if (digits !== val) {
              ctrl.$setViewValue(digits);
              ctrl.$render();
            }
            return parseFloat(digits);
          }
          return undefined;
        }            
        ctrl.$parsers.push(inputValue);
      }
    };
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

gnscsApp.directive('currencyInput', function($filter, $browser) {
    return {
        require: 'ngModel',
        link: function($scope, $element, $attrs, ngModelCtrl) {
            var listener = function() {
                var value = $element.val().replace(/,/g, '')
                $element.val($filter('number')(value, false))
            }
            
            // This runs when we update the text field
            ngModelCtrl.$parsers.push(function(viewValue) {
                return viewValue.replace(/,/g, '');
            })
            
            // This runs when the model gets updated on the scope directly and keeps our view in sync
            ngModelCtrl.$render = function() {
                $element.val($filter('number')(ngModelCtrl.$viewValue, false))
            }
            
            $element.bind('change', listener)
            $element.bind('keydown', function(event) {
                var key = event.keyCode
                // If the keys include the CTRL, SHIFT, ALT, or META keys, or the arrow keys, do nothing.
                // This lets us support copy and paste too
                if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)) 
                    return 
                $browser.defer(listener) // Have to do this or changes don't get picked up properly
            })
            
            $element.bind('paste cut', function() {
                $browser.defer(listener)  
            })
        }
        
    }
})