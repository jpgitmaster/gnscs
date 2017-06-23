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
eval("'use strict';\r\nvar gnscsApp = angular.module('gnscsApp', ['ngSanitize', 'ngAnimate', 'ngResource', 'admnhdr', 'admncntnt']);\r\n\r\ngnscsApp.directive('resizePage', function ($window, $timeout) {\r\n    return function (scope, element) {\r\n      var w = angular.element($window);\r\n        scope.getWindowDimensions = function () {\r\n            return {\r\n                'h': w.height(),\r\n                'w': w.width()\r\n            };\r\n        };\r\n        scope.menu = true;\r\n        scope.getPageSize = function(menu){\r\n    \t\tif(menu == false){\r\n        \t\tscope.menu = true;\r\n        \t}\r\n        \tif(menu == true){\r\n        \t\tscope.menu = false;\r\n        \t} \r\n        }\r\n\r\n        scope.$watch(scope.getWindowDimensions, function (newValue, oldValue) {\r\n            var get_height = newValue.h;\r\n            var get_width = newValue.w;\r\n            \r\n            if(get_width > 992){\r\n            \tscope.menu = false;\r\n            }else{\r\n                scope.menu = true;\r\n            }          \r\n        }, true);\r\n\r\n        w.bind('resize', function () {\r\n            scope.$apply();\r\n        });\r\n    }\r\n});\r\ngnscsApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});\r\n'use strict'; \r\nvar admnhdr = angular.module('admnhdr', []);\r\n\r\nadmnhdr.controller('ctrlHeader', ['$scope', function($scope) {\r\n\r\n}]);\r\n\r\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FkbWluL25nX2FkbWluLmpzPzNkY2EiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgZ25zY3NBcHAgPSBhbmd1bGFyLm1vZHVsZSgnZ25zY3NBcHAnLCBbJ25nU2FuaXRpemUnLCAnbmdBbmltYXRlJywgJ25nUmVzb3VyY2UnLCAnYWRtbmhkcicsICdhZG1uY250bnQnXSk7XHJcblxyXG5nbnNjc0FwcC5kaXJlY3RpdmUoJ3Jlc2l6ZVBhZ2UnLCBmdW5jdGlvbiAoJHdpbmRvdywgJHRpbWVvdXQpIHtcclxuICAgIHJldHVybiBmdW5jdGlvbiAoc2NvcGUsIGVsZW1lbnQpIHtcclxuICAgICAgdmFyIHcgPSBhbmd1bGFyLmVsZW1lbnQoJHdpbmRvdyk7XHJcbiAgICAgICAgc2NvcGUuZ2V0V2luZG93RGltZW5zaW9ucyA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHtcclxuICAgICAgICAgICAgICAgICdoJzogdy5oZWlnaHQoKSxcclxuICAgICAgICAgICAgICAgICd3Jzogdy53aWR0aCgpXHJcbiAgICAgICAgICAgIH07XHJcbiAgICAgICAgfTtcclxuICAgICAgICBzY29wZS5tZW51ID0gdHJ1ZTtcclxuICAgICAgICBzY29wZS5nZXRQYWdlU2l6ZSA9IGZ1bmN0aW9uKG1lbnUpe1xyXG4gICAgXHRcdGlmKG1lbnUgPT0gZmFsc2Upe1xyXG4gICAgICAgIFx0XHRzY29wZS5tZW51ID0gdHJ1ZTtcclxuICAgICAgICBcdH1cclxuICAgICAgICBcdGlmKG1lbnUgPT0gdHJ1ZSl7XHJcbiAgICAgICAgXHRcdHNjb3BlLm1lbnUgPSBmYWxzZTtcclxuICAgICAgICBcdH0gXHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBzY29wZS4kd2F0Y2goc2NvcGUuZ2V0V2luZG93RGltZW5zaW9ucywgZnVuY3Rpb24gKG5ld1ZhbHVlLCBvbGRWYWx1ZSkge1xyXG4gICAgICAgICAgICB2YXIgZ2V0X2hlaWdodCA9IG5ld1ZhbHVlLmg7XHJcbiAgICAgICAgICAgIHZhciBnZXRfd2lkdGggPSBuZXdWYWx1ZS53O1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgaWYoZ2V0X3dpZHRoID4gOTkyKXtcclxuICAgICAgICAgICAgXHRzY29wZS5tZW51ID0gZmFsc2U7XHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgc2NvcGUubWVudSA9IHRydWU7XHJcbiAgICAgICAgICAgIH0gICAgICAgICAgXHJcbiAgICAgICAgfSwgdHJ1ZSk7XHJcblxyXG4gICAgICAgIHcuYmluZCgncmVzaXplJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBzY29wZS4kYXBwbHkoKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxufSk7XHJcbmduc2NzQXBwLmNvbmZpZyhmdW5jdGlvbigkaW50ZXJwb2xhdGVQcm92aWRlcil7XHJcbiAgICAkaW50ZXJwb2xhdGVQcm92aWRlci5zdGFydFN5bWJvbCgnPCU9JykuZW5kU3ltYm9sKCclPicpO1xyXG59KTtcclxuJ3VzZSBzdHJpY3QnOyBcclxudmFyIGFkbW5oZHIgPSBhbmd1bGFyLm1vZHVsZSgnYWRtbmhkcicsIFtdKTtcclxuXHJcbmFkbW5oZHIuY29udHJvbGxlcignY3RybEhlYWRlcicsIFsnJHNjb3BlJywgZnVuY3Rpb24oJHNjb3BlKSB7XHJcblxyXG59XSk7XHJcblxyXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hZG1pbi9uZ19hZG1pbi5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);