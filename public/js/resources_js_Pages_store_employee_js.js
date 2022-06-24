"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_store_employee_js"],{

/***/ "./resources/js/Pages/store/employee.js":
/*!**********************************************!*\
  !*** ./resources/js/Pages/store/employee.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var EmployeeStore = {
  state: {
    employeeList: [],
    employeeMeta: {},
    employeeLinks: {},
    employeeErrors: null,
    employee: {}
  },
  mutations: {
    setEmployeeList: function setEmployeeList(state, employeeList) {
      return state.employeeList = employeeList;
    },
    setEmployeeMeta: function setEmployeeMeta(state, employeeMeta) {
      return state.employeeMeta = employeeMeta;
    },
    setEmployeeLink: function setEmployeeLink(state, employeeLinks) {
      return state.employeeLinks = employeeLinks;
    },
    setEmployeeErrors: function setEmployeeErrors(state, employeeErrors) {
      return state.employeeErrors = employeeErrors;
    },
    setEmployee: function setEmployee(state, employee) {
      return state.employee = employee;
    }
  },
  actions: {
    loadEmployeeList: function loadEmployeeList(_ref, payload) {
      var commit = _ref.commit;
      commit("setEmployeeList", payload.data);
      commit("setEmployeeMeta", payload.meta);
      commit("setEmployeeLink", payload.links);
    }
  },
  getters: {
    getEmployeeList: function getEmployeeList(state) {
      return state.employeeList;
    },
    getEmployeeMeta: function getEmployeeMeta(state) {
      return state.employeeMeta;
    },
    getEmployeeLInks: function getEmployeeLInks(state) {
      return state.employeeLinks;
    },
    getEmployee: function getEmployee(state) {
      return state.employee;
    }
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (EmployeeStore);

/***/ })

}]);