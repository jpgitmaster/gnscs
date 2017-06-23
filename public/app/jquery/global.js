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

eval("$(function() {\r\n\t$(this).on('show.bs.modal', function(e) {\r\n      $('.modal-dialog').velocity('transition.flipXIn');\r\n    });\r\n    \r\n  // We can attach the `fileselect` event to all file inputs on the page\r\n  // $(document).on('change', ':file', function() {\r\n  //   var input = $(this),\r\n  //       numFiles = input.get(0).files ? input.get(0).files.length : 1,\r\n  //       label = input.val().replace(/\\\\/g, '/').replace(/.*\\//, '');\r\n  //   input.trigger('fileselect', [numFiles, label]);\r\n  // });\r\n\r\n  // // We can watch for our custom `fileselect` event like this\r\n  // $(document).ready( function() {\r\n  //     $(':file').on('fileselect', function(event, numFiles, label) {\r\n\r\n  //         var input = $(this).parents('.input-group').find(':text'),\r\n  //             log = numFiles > 1 ? numFiles + ' files selected' : label;\r\n\r\n  //         if( input.length ) {\r\n  //             input.val(log);\r\n  //         } else {\r\n  //             if( log ) alert(log);\r\n  //         }\r\n\r\n  //     });\r\n  // });\r\n  \r\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2dsb2JhbF9qcXVlcnkvZ2xvYmFsLmpzPzIzZTUiXSwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbigpIHtcclxuXHQkKHRoaXMpLm9uKCdzaG93LmJzLm1vZGFsJywgZnVuY3Rpb24oZSkge1xyXG4gICAgICAkKCcubW9kYWwtZGlhbG9nJykudmVsb2NpdHkoJ3RyYW5zaXRpb24uZmxpcFhJbicpO1xyXG4gICAgfSk7XHJcbiAgICBcclxuICAvLyBXZSBjYW4gYXR0YWNoIHRoZSBgZmlsZXNlbGVjdGAgZXZlbnQgdG8gYWxsIGZpbGUgaW5wdXRzIG9uIHRoZSBwYWdlXHJcbiAgLy8gJChkb2N1bWVudCkub24oJ2NoYW5nZScsICc6ZmlsZScsIGZ1bmN0aW9uKCkge1xyXG4gIC8vICAgdmFyIGlucHV0ID0gJCh0aGlzKSxcclxuICAvLyAgICAgICBudW1GaWxlcyA9IGlucHV0LmdldCgwKS5maWxlcyA/IGlucHV0LmdldCgwKS5maWxlcy5sZW5ndGggOiAxLFxyXG4gIC8vICAgICAgIGxhYmVsID0gaW5wdXQudmFsKCkucmVwbGFjZSgvXFxcXC9nLCAnLycpLnJlcGxhY2UoLy4qXFwvLywgJycpO1xyXG4gIC8vICAgaW5wdXQudHJpZ2dlcignZmlsZXNlbGVjdCcsIFtudW1GaWxlcywgbGFiZWxdKTtcclxuICAvLyB9KTtcclxuXHJcbiAgLy8gLy8gV2UgY2FuIHdhdGNoIGZvciBvdXIgY3VzdG9tIGBmaWxlc2VsZWN0YCBldmVudCBsaWtlIHRoaXNcclxuICAvLyAkKGRvY3VtZW50KS5yZWFkeSggZnVuY3Rpb24oKSB7XHJcbiAgLy8gICAgICQoJzpmaWxlJykub24oJ2ZpbGVzZWxlY3QnLCBmdW5jdGlvbihldmVudCwgbnVtRmlsZXMsIGxhYmVsKSB7XHJcblxyXG4gIC8vICAgICAgICAgdmFyIGlucHV0ID0gJCh0aGlzKS5wYXJlbnRzKCcuaW5wdXQtZ3JvdXAnKS5maW5kKCc6dGV4dCcpLFxyXG4gIC8vICAgICAgICAgICAgIGxvZyA9IG51bUZpbGVzID4gMSA/IG51bUZpbGVzICsgJyBmaWxlcyBzZWxlY3RlZCcgOiBsYWJlbDtcclxuXHJcbiAgLy8gICAgICAgICBpZiggaW5wdXQubGVuZ3RoICkge1xyXG4gIC8vICAgICAgICAgICAgIGlucHV0LnZhbChsb2cpO1xyXG4gIC8vICAgICAgICAgfSBlbHNlIHtcclxuICAvLyAgICAgICAgICAgICBpZiggbG9nICkgYWxlcnQobG9nKTtcclxuICAvLyAgICAgICAgIH1cclxuXHJcbiAgLy8gICAgIH0pO1xyXG4gIC8vIH0pO1xyXG4gIFxyXG59KTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9nbG9iYWxfanF1ZXJ5L2dsb2JhbC5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQXlCQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);