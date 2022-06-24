"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_store_user_js"],{

/***/ "./resources/js/Pages/store/user.js":
/*!******************************************!*\
  !*** ./resources/js/Pages/store/user.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var UserStore = {
  state: {
    userList: [],
    userMeta: {},
    userLinks: {},
    userErrors: null,
    user: {}
  },
  mutations: {
    setUserList: function setUserList(state, userList) {
      return state.userList = userList;
    },
    setUserMeta: function setUserMeta(state, userMeta) {
      return state.userMeta = userMeta;
    },
    setUserLink: function setUserLink(state, userLinks) {
      return state.userLinks = userLinks;
    },
    setUserErrors: function setUserErrors(state, userErrors) {
      return state.userErrors = userErrors;
    },
    setUser: function setUser(state, user) {
      return state.user = user;
    }
  },
  actions: {
    loadUserList: function loadUserList(_ref, payload) {
      var commit = _ref.commit;
      commit("setUserList", payload.data);
      commit("setUserMeta", payload.meta);
      commit("setUserLink", payload.links);
    }
  },
  getters: {
    getUserList: function getUserList(state) {
      return state.userList;
    },
    getUserMeta: function getUserMeta(state) {
      return state.userMeta;
    },
    getUserLInks: function getUserLInks(state) {
      return state.userLinks;
    },
    getUser: function getUser(state) {
      return state.user;
    }
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UserStore);

/***/ })

}]);