'use strict'; 
var admncntnt = angular.module('admncntnt', []);

admncntnt.factory('applicants_api', function ($resource) {
    return $resource('get_applicants', {}, {
        query : { method: 'GET', isArray: true }
    });
});

admncntnt.controller('ctrlContent', ['$scope', '$filter', 'applicants_api', function($scope, $filter, applicants_api) {
    $scope.applicants = applicants_api.query();

    $scope.viewResume = function(usr){
        $scope.usr = usr;
        $scope.edcs = usr.edcs;
        $scope.emps = usr.emps;
        $scope.chrs = usr.chrs;
        $scope.slctjbs = eval(usr.jobs_id);
        $('#resume_tpl').appendTo('body').modal().velocity('transition.flipXIn');
    }

    $scope.get_selection = function(arr, arr_id){
        return $filter('filter')(arr, {id: arr_id})[0].name;
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

    $scope.currencies = [
        { id: 1, name: 'USD $' },
        { id: 2, name: 'Php ₱' }
    ];

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
}]);