/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backend/activity/activity.js":
/*!***************************************************!*\
  !*** ./resources/js/backend/activity/activity.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Dependency Element
var xhr = new XMLHttpRequest();
var frmActivity = document.getElementById('frmActivity');
var btnSave = document.getElementById('btnSave');
var btnCreate = document.getElementById('btnCreate');
var txtActivityTitle = document.getElementById('txtTitle');
var txtActivityThumbnail = document.getElementById('txtThumbnail');
var txtActivityDetail = document.getElementById('txtDetail'); // Dependency Variable

var tableId = 'activityTable';
var NeworUpdate = 0; // 0 = New and 1 = Update

var ActivityId = null; // Dependency URL

var urlCreate = "".concat(window.origin, "/backend/activity/store");
var urlDisable = "".concat(window.origin, "/backend/activity/disable");
var urlEdit = "".concat(window.origin, "/backend/activity/edit");
var urlUpdate = "".concat(window.origin, "/backend/activity/update");
btnCreate.addEventListener('click', function () {
  document.getElementsByClassName('entry-form-contain')[0].style.display = 'block';
});
btnSave.addEventListener('click', function (e) {
  var frmData = new FormData(frmActivity);

  if (NeworUpdate === 0) {
    xhr.open('post', urlCreate, true);

    xhr.onload = function () {
      if (xhr.status === 200) {
        reloadDataTabel(tableId);
        txtActivityTitle.value = "";
        txtActivityThumbnail.filename = "";
        $('#txtDetail').summernote('code', '');
      }
    };
  } else if (NeworUpdate === 1) {
    xhr.open('post', "".concat(urlUpdate, "/").concat(ActivityId));

    xhr.onload = function () {
      if (xhr.status === 200) {
        reloadDataTabel(tableId);
        NeworUpdate = 0;
        ActivityId = null;
        txtActivityTitle.value = "";
        txtActivityThumbnail.filename = "";
        $('#txtDetail').summernote('code', '');
        document.getElementsByClassName('entry-form-contain')[0].style.display = 'none';
      }
    };
  }

  xhr.send(frmData);
});
$(document).on('click', '#btnDisable', function () {
  xhr.open('get', "".concat(urlDisable, "/").concat($(this).attr('data-id')));

  xhr.onload = function () {
    if (xhr.status === 200) {
      reloadDataTabel(tableId);
    }
  };

  xhr.send();
});
$(document).on('click', '#btnEdit', function () {
  ActivityId = $(this).attr('data-id');
  xhr.open('get', "".concat(urlEdit, "/").concat(ActivityId));

  xhr.onload = function () {
    if (xhr.status === 200) {
      document.getElementsByClassName('entry-form-contain')[0].style.display = 'block';
      var data = JSON.parse(xhr.responseText);
      txtActivityTitle.value = data.title;
      txtActivityThumbnail.filename = data.thumbnail;
      $('#txtDetail').summernote('code', data.detail);
      NeworUpdate = 1;
    }
  };

  xhr.send();
});

function reloadDataTabel(tableId) {
  var tableIdl = "#" + tableId;
  $(tableIdl).DataTable().ajax.reload();
}

/***/ }),

/***/ 6:
/*!*********************************************************!*\
  !*** multi ./resources/js/backend/activity/activity.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/DATA/do/Laravel/OT/ova project/ova/resources/js/backend/activity/activity.js */"./resources/js/backend/activity/activity.js");


/***/ })

/******/ });