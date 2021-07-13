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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backend/partner/partner.js":
/*!*************************************************!*\
  !*** ./resources/js/backend/partner/partner.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Dependency Element
var xhr = new XMLHttpRequest();
var frmPartner = document.getElementById('frmPartner');
var btnSave = document.getElementById('btnSave');
var txtPartnerName = document.getElementById('txtPartnerName');
var txtPartnerLogo = document.getElementById('txtPartnerLogo'); // Dependency Variable

var tableId = 'partnerTable';
var NeworUpdate = 0; // 0 = New and 1 = Update

var PartnerId = null; // Dependency URL

var urlCreate = "".concat(window.origin, "/backend/partner/store");
var urlDisable = "".concat(window.origin, "/backend/partner/disable");
var urlEdit = "".concat(window.origin, "/backend/partner/edit");
var urlUpdate = "".concat(window.origin, "/backend/partner/update");
btnSave.addEventListener('click', function (e) {
  var frmData = new FormData(frmPartner);

  if (NeworUpdate === 0) {
    xhr.open('post', urlCreate, true);

    xhr.onload = function () {
      if (xhr.status === 200) {
        reloadDataTabel(tableId);
        txtPartnerName.value = "";
        txtPartnerLogo.filename = "";
      }
    };
  } else if (NeworUpdate === 1) {
    xhr.open('post', "".concat(urlUpdate, "/").concat(PartnerId));

    xhr.onload = function () {
      if (xhr.status === 200) {
        reloadDataTabel(tableId);
        NeworUpdate = 0;
        PartnerId = null;
        txtPartnerName.value = "";
        txtPartnerLogo.filename = "";
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
  PartnerId = $(this).attr('data-id');
  xhr.open('get', "".concat(urlEdit, "/").concat(PartnerId));

  xhr.onload = function () {
    if (xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      txtPartnerName.value = data.name;
      txtPartnerLogo.filename = data.logo;
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

/***/ 1:
/*!*******************************************************!*\
  !*** multi ./resources/js/backend/partner/partner.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/DATA/do/Laravel/OT/ova project/ova/resources/js/backend/partner/partner.js */"./resources/js/backend/partner/partner.js");


/***/ })

/******/ });