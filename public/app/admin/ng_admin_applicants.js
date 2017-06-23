/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

"use strict";
eval("'use strict'; \r\nvar admncntnt = angular.module('admncntnt', []);\r\n\r\nadmncntnt.factory('applicants_api', function ($resource) {\r\n    return $resource('get_applicants', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\n\r\nadmncntnt.controller('ctrlContent', ['$scope', '$filter', 'applicants_api', function($scope, $filter, applicants_api) {\r\n    $scope.applicants = applicants_api.query();\r\n\r\n    $scope.viewResume = function(usr){\r\n        $scope.usr = usr;\r\n        $scope.edcs = usr.edcs;\r\n        $scope.emps = usr.emps;\r\n        $scope.chrs = usr.chrs;\r\n        $scope.slctjbs = eval(usr.jobs_id);\r\n        $('#resume_tpl').appendTo('body').modal().velocity('transition.flipXIn');\r\n    }\r\n\r\n    $scope.get_selection = function(arr, arr_id){\r\n        return $filter('filter')(arr, {id: arr_id})[0].name;\r\n    }\r\n\r\n    $scope.jbpositions = [\r\n        {id: 1, name: 'RN Supervisors', selected: false},\r\n        {id: 2, name: 'Licensed Speech Therapists', selected: false},\r\n        {id: 3, name: 'Physical Therapy Assistants', selected: false},\r\n        {id: 4, name: 'Occupational Therapy Assistants', selected: false},\r\n        {id: 5, name: 'Certified Nursing Assistants', selected: false},\r\n        {id: 6, name: 'Licensed Occupational Therapists', selected: false},\r\n        {id: 7, name: 'Licensed Physical Therapists', selected: false},\r\n        {id: 8, name: 'Registered Nurses', selected: false},\r\n        {id: 9, name: 'Licensed Practical Nurses', selected: false}\r\n    ];\r\n\r\n    $scope.currencies = [\r\n        { id: 1, name: 'USD $' },\r\n        { id: 2, name: 'Php ₱' }\r\n    ];\r\n\r\n    $scope.gender = [\r\n        {id: 1, name: 'Female'},\r\n        {id: 2, name: 'Male'}\r\n    ];\r\n\r\n    $scope.cstatus = [\r\n        {id: 1, name: 'Single'},\r\n        {id: 2, name: 'Married'},\r\n        {id: 3, name: 'Legally separated'},\r\n        {id: 4, name: 'Annulled'},\r\n        {id: 5, name: 'Widow'},\r\n        {id: 6, name: 'Widower'}\r\n    ];\r\n\r\n    $scope.typework = [\r\n        {id: 1, name: 'Full-Time'},\r\n        {id: 2, name: 'Part-Time'},\r\n        {id: 3, name: 'Freelance'},\r\n        {id: 4, name: 'Contractual'},\r\n        {id: 5, name: 'Work from Home'},\r\n        {id: 6, name: 'Project Base'},\r\n        {id: 7, name: 'Temporary'}\r\n    ];\r\n\r\n    $scope.edctypes = [\r\n        {id: 1, name: 'High School'},\r\n        {id: 2, name: 'College'},\r\n        {id: 3, name: 'Vocational'},\r\n        {id: 4, name: 'Others'}\r\n    ];\r\n\r\n    $scope.yrsxprncs = [\r\n        {id: 1, name: 'No Work Experience'},\r\n        {id: 2, name: '1-3 Yrs. of Experience'},\r\n        {id: 3, name: '4-6 Yrs. of Experience'},\r\n        {id: 4, name: '7 yrs. and Above'}\r\n    ];\r\n\r\n    $scope.cntctbys = [\r\n        {id: 1, name: 'Email'},\r\n        {id: 2, name: 'Phone No.'},\r\n        {id: 3, name: 'Mobile No.'},\r\n        {id: 4, name: 'Skype'},\r\n        {id: 5, name: 'Viber'},\r\n        {id: 6, name: 'Yahoo Messenger'}\r\n    ];\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FkbWluL25nX2FkbWluX2FwcGxpY2FudHMuanM/YTYxOSJdLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7IFxyXG52YXIgYWRtbmNudG50ID0gYW5ndWxhci5tb2R1bGUoJ2FkbW5jbnRudCcsIFtdKTtcclxuXHJcbmFkbW5jbnRudC5mYWN0b3J5KCdhcHBsaWNhbnRzX2FwaScsIGZ1bmN0aW9uICgkcmVzb3VyY2UpIHtcclxuICAgIHJldHVybiAkcmVzb3VyY2UoJ2dldF9hcHBsaWNhbnRzJywge30sIHtcclxuICAgICAgICBxdWVyeSA6IHsgbWV0aG9kOiAnR0VUJywgaXNBcnJheTogdHJ1ZSB9XHJcbiAgICB9KTtcclxufSk7XHJcblxyXG5hZG1uY250bnQuY29udHJvbGxlcignY3RybENvbnRlbnQnLCBbJyRzY29wZScsICckZmlsdGVyJywgJ2FwcGxpY2FudHNfYXBpJywgZnVuY3Rpb24oJHNjb3BlLCAkZmlsdGVyLCBhcHBsaWNhbnRzX2FwaSkge1xyXG4gICAgJHNjb3BlLmFwcGxpY2FudHMgPSBhcHBsaWNhbnRzX2FwaS5xdWVyeSgpO1xyXG5cclxuICAgICRzY29wZS52aWV3UmVzdW1lID0gZnVuY3Rpb24odXNyKXtcclxuICAgICAgICAkc2NvcGUudXNyID0gdXNyO1xyXG4gICAgICAgICRzY29wZS5lZGNzID0gdXNyLmVkY3M7XHJcbiAgICAgICAgJHNjb3BlLmVtcHMgPSB1c3IuZW1wcztcclxuICAgICAgICAkc2NvcGUuY2hycyA9IHVzci5jaHJzO1xyXG4gICAgICAgICRzY29wZS5zbGN0amJzID0gZXZhbCh1c3Iuam9ic19pZCk7XHJcbiAgICAgICAgJCgnI3Jlc3VtZV90cGwnKS5hcHBlbmRUbygnYm9keScpLm1vZGFsKCkudmVsb2NpdHkoJ3RyYW5zaXRpb24uZmxpcFhJbicpO1xyXG4gICAgfVxyXG5cclxuICAgICRzY29wZS5nZXRfc2VsZWN0aW9uID0gZnVuY3Rpb24oYXJyLCBhcnJfaWQpe1xyXG4gICAgICAgIHJldHVybiAkZmlsdGVyKCdmaWx0ZXInKShhcnIsIHtpZDogYXJyX2lkfSlbMF0ubmFtZTtcclxuICAgIH1cclxuXHJcbiAgICAkc2NvcGUuamJwb3NpdGlvbnMgPSBbXHJcbiAgICAgICAge2lkOiAxLCBuYW1lOiAnUk4gU3VwZXJ2aXNvcnMnLCBzZWxlY3RlZDogZmFsc2V9LFxyXG4gICAgICAgIHtpZDogMiwgbmFtZTogJ0xpY2Vuc2VkIFNwZWVjaCBUaGVyYXBpc3RzJywgc2VsZWN0ZWQ6IGZhbHNlfSxcclxuICAgICAgICB7aWQ6IDMsIG5hbWU6ICdQaHlzaWNhbCBUaGVyYXB5IEFzc2lzdGFudHMnLCBzZWxlY3RlZDogZmFsc2V9LFxyXG4gICAgICAgIHtpZDogNCwgbmFtZTogJ09jY3VwYXRpb25hbCBUaGVyYXB5IEFzc2lzdGFudHMnLCBzZWxlY3RlZDogZmFsc2V9LFxyXG4gICAgICAgIHtpZDogNSwgbmFtZTogJ0NlcnRpZmllZCBOdXJzaW5nIEFzc2lzdGFudHMnLCBzZWxlY3RlZDogZmFsc2V9LFxyXG4gICAgICAgIHtpZDogNiwgbmFtZTogJ0xpY2Vuc2VkIE9jY3VwYXRpb25hbCBUaGVyYXBpc3RzJywgc2VsZWN0ZWQ6IGZhbHNlfSxcclxuICAgICAgICB7aWQ6IDcsIG5hbWU6ICdMaWNlbnNlZCBQaHlzaWNhbCBUaGVyYXBpc3RzJywgc2VsZWN0ZWQ6IGZhbHNlfSxcclxuICAgICAgICB7aWQ6IDgsIG5hbWU6ICdSZWdpc3RlcmVkIE51cnNlcycsIHNlbGVjdGVkOiBmYWxzZX0sXHJcbiAgICAgICAge2lkOiA5LCBuYW1lOiAnTGljZW5zZWQgUHJhY3RpY2FsIE51cnNlcycsIHNlbGVjdGVkOiBmYWxzZX1cclxuICAgIF07XHJcblxyXG4gICAgJHNjb3BlLmN1cnJlbmNpZXMgPSBbXHJcbiAgICAgICAgeyBpZDogMSwgbmFtZTogJ1VTRCAkJyB9LFxyXG4gICAgICAgIHsgaWQ6IDIsIG5hbWU6ICdQaHAg4oKxJyB9XHJcbiAgICBdO1xyXG5cclxuICAgICRzY29wZS5nZW5kZXIgPSBbXHJcbiAgICAgICAge2lkOiAxLCBuYW1lOiAnRmVtYWxlJ30sXHJcbiAgICAgICAge2lkOiAyLCBuYW1lOiAnTWFsZSd9XHJcbiAgICBdO1xyXG5cclxuICAgICRzY29wZS5jc3RhdHVzID0gW1xyXG4gICAgICAgIHtpZDogMSwgbmFtZTogJ1NpbmdsZSd9LFxyXG4gICAgICAgIHtpZDogMiwgbmFtZTogJ01hcnJpZWQnfSxcclxuICAgICAgICB7aWQ6IDMsIG5hbWU6ICdMZWdhbGx5IHNlcGFyYXRlZCd9LFxyXG4gICAgICAgIHtpZDogNCwgbmFtZTogJ0FubnVsbGVkJ30sXHJcbiAgICAgICAge2lkOiA1LCBuYW1lOiAnV2lkb3cnfSxcclxuICAgICAgICB7aWQ6IDYsIG5hbWU6ICdXaWRvd2VyJ31cclxuICAgIF07XHJcblxyXG4gICAgJHNjb3BlLnR5cGV3b3JrID0gW1xyXG4gICAgICAgIHtpZDogMSwgbmFtZTogJ0Z1bGwtVGltZSd9LFxyXG4gICAgICAgIHtpZDogMiwgbmFtZTogJ1BhcnQtVGltZSd9LFxyXG4gICAgICAgIHtpZDogMywgbmFtZTogJ0ZyZWVsYW5jZSd9LFxyXG4gICAgICAgIHtpZDogNCwgbmFtZTogJ0NvbnRyYWN0dWFsJ30sXHJcbiAgICAgICAge2lkOiA1LCBuYW1lOiAnV29yayBmcm9tIEhvbWUnfSxcclxuICAgICAgICB7aWQ6IDYsIG5hbWU6ICdQcm9qZWN0IEJhc2UnfSxcclxuICAgICAgICB7aWQ6IDcsIG5hbWU6ICdUZW1wb3JhcnknfVxyXG4gICAgXTtcclxuXHJcbiAgICAkc2NvcGUuZWRjdHlwZXMgPSBbXHJcbiAgICAgICAge2lkOiAxLCBuYW1lOiAnSGlnaCBTY2hvb2wnfSxcclxuICAgICAgICB7aWQ6IDIsIG5hbWU6ICdDb2xsZWdlJ30sXHJcbiAgICAgICAge2lkOiAzLCBuYW1lOiAnVm9jYXRpb25hbCd9LFxyXG4gICAgICAgIHtpZDogNCwgbmFtZTogJ090aGVycyd9XHJcbiAgICBdO1xyXG5cclxuICAgICRzY29wZS55cnN4cHJuY3MgPSBbXHJcbiAgICAgICAge2lkOiAxLCBuYW1lOiAnTm8gV29yayBFeHBlcmllbmNlJ30sXHJcbiAgICAgICAge2lkOiAyLCBuYW1lOiAnMS0zIFlycy4gb2YgRXhwZXJpZW5jZSd9LFxyXG4gICAgICAgIHtpZDogMywgbmFtZTogJzQtNiBZcnMuIG9mIEV4cGVyaWVuY2UnfSxcclxuICAgICAgICB7aWQ6IDQsIG5hbWU6ICc3IHlycy4gYW5kIEFib3ZlJ31cclxuICAgIF07XHJcblxyXG4gICAgJHNjb3BlLmNudGN0YnlzID0gW1xyXG4gICAgICAgIHtpZDogMSwgbmFtZTogJ0VtYWlsJ30sXHJcbiAgICAgICAge2lkOiAyLCBuYW1lOiAnUGhvbmUgTm8uJ30sXHJcbiAgICAgICAge2lkOiAzLCBuYW1lOiAnTW9iaWxlIE5vLid9LFxyXG4gICAgICAgIHtpZDogNCwgbmFtZTogJ1NreXBlJ30sXHJcbiAgICAgICAge2lkOiA1LCBuYW1lOiAnVmliZXInfSxcclxuICAgICAgICB7aWQ6IDYsIG5hbWU6ICdZYWhvbyBNZXNzZW5nZXInfVxyXG4gICAgXTtcclxufV0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL2FkbWluL25nX2FkbWluX2FwcGxpY2FudHMuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);