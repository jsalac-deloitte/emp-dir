"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_api_httpService_js"],{

/***/ "./resources/js/Pages/api/httpService.js":
/*!***********************************************!*\
  !*** ./resources/js/Pages/api/httpService.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);

var apiHttp = axios__WEBPACK_IMPORTED_MODULE_0___default().create({
  baseURL: "http://seph-vilt.herokuapp.com",
  headers: {
    "X-Requested-With": "XMLHttpRequest"
  }
});
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (apiHttp);

/***/ })

}]);