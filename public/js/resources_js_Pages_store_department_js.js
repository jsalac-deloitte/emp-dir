"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_store_department_js"],{

/***/ "./resources/js/Pages/store/department.js":
/*!************************************************!*\
  !*** ./resources/js/Pages/store/department.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var DepartmentStore = {
  state: {
    departmentList: [],
    departmentMeta: {},
    departmentLinks: {},
    departmentErrors: null,
    department: {}
  },
  mutations: {
    setDepartmentList: function setDepartmentList(state, departmentList) {
      return state.departmentList = departmentList;
    },
    setDepartmentMeta: function setDepartmentMeta(state, departmentMeta) {
      return state.departmentMeta = departmentMeta;
    },
    setDepartmentLink: function setDepartmentLink(state, departmentLinks) {
      return state.departmentLinks = departmentLinks;
    },
    setDepartmentErrors: function setDepartmentErrors(state, departmentErrors) {
      return state.departmentErrors = departmentErrors;
    },
    setDepartment: function setDepartment(state, department) {
      return state.department = department;
    }
  },
  actions: {
    loadDepartmentList: function loadDepartmentList(_ref, payload) {
      var commit = _ref.commit;
      commit("setDepartmentList", payload.data);
      commit("setDepartmentMeta", payload.meta);
      commit("setDepartmentLink", payload.links);
    }
  },
  getters: {
    getDepartmentList: function getDepartmentList(state) {
      return state.departmentList;
    },
    getDepartmentMeta: function getDepartmentMeta(state) {
      return state.departmentMeta;
    },
    getDepartmentLInks: function getDepartmentLInks(state) {
      return state.departmentLinks;
    },
    getDepartment: function getDepartment(state) {
      return state.department;
    }
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (DepartmentStore);

/***/ })

}]);