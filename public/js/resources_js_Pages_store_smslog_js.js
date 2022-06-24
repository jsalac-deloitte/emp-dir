"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_store_smslog_js"],{

/***/ "./resources/js/Pages/store/smslog.js":
/*!********************************************!*\
  !*** ./resources/js/Pages/store/smslog.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var SmsLogStore = {
  state: {
    smslogList: [],
    smslogMeta: {},
    smslogLinks: {},
    smslogErrors: null,
    smslog: {}
  },
  mutations: {
    setSmsLogList: function setSmsLogList(state, smslogList) {
      return state.smslogList = smslogList;
    },
    setSmsLogMeta: function setSmsLogMeta(state, smslogMeta) {
      return state.smslogMeta = smslogMeta;
    },
    setSmsLogLink: function setSmsLogLink(state, smslogLinks) {
      return state.smslogLinks = smslogLinks;
    },
    setSmsLogErrors: function setSmsLogErrors(state, smslogErrors) {
      return state.smslogErrors = smslogErrors;
    },
    setSmsLog: function setSmsLog(state, smslog) {
      return state.smslog = smslog;
    }
  },
  actions: {
    loadSmsLogList: function loadSmsLogList(_ref, payload) {
      var commit = _ref.commit;
      commit("setSmsLogList", payload.data);
      commit("setSmsLogMeta", payload.meta);
      commit("setSmsLogLink", payload.links);
    }
  },
  getters: {
    getSmsLogList: function getSmsLogList(state) {
      return state.smslogList;
    },
    getSmsLogMeta: function getSmsLogMeta(state) {
      return state.smslogMeta;
    },
    getSmsLogLinks: function getSmsLogLinks(state) {
      return state.smslogLinks;
    },
    getSmsLog: function getSmsLog(state) {
      return state.smslog;
    }
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SmsLogStore);

/***/ })

}]);