"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_store_company_js"],{

/***/ "./resources/js/Pages/store/company.js":
/*!*********************************************!*\
  !*** ./resources/js/Pages/store/company.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var CompanyStore = {
  state: {
    companyList: [],
    companyMeta: {},
    companyLinks: {},
    companyErrors: null,
    company: {}
  },
  mutations: {
    setCompanyList: function setCompanyList(state, companyList) {
      return state.companyList = companyList;
    },
    setCompanyMeta: function setCompanyMeta(state, companyMeta) {
      return state.companyMeta = companyMeta;
    },
    setCompanyLinks: function setCompanyLinks(state, companyLinks) {
      return state.companyLinks = companyLinks;
    },
    setDepartmentErrors: function setDepartmentErrors(state, companyErrors) {
      return state.companyErrors = companyErrors;
    },
    setDepartment: function setDepartment(state, company) {
      return state.company = company;
    }
  },
  actions: {
    loadCompanyList: function loadCompanyList(_ref, payload) {
      var commit = _ref.commit;
      commit("setCompanyList", payload.data);
      commit("setCompanyMeta", payload.meta);
      commit("setCompanyLinks", payload.links);
    }
  },
  getters: {
    getCompanyList: function getCompanyList(state) {
      return state.companyList;
    },
    getCompanyMeta: function getCompanyMeta(state) {
      return state.companyMeta;
    },
    getCompanyLInks: function getCompanyLInks(state) {
      return state.companyLinks;
    },
    getCompany: function getCompany(state) {
      return state.company;
    }
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CompanyStore);

/***/ })

}]);