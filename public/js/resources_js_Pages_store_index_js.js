"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_store_index_js"],{

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

/***/ }),

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

/***/ }),

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

/***/ }),

/***/ "./resources/js/Pages/store/index.js":
/*!*******************************************!*\
  !*** ./resources/js/Pages/store/index.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm-bundler.js");
/* harmony import */ var _company__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./company */ "./resources/js/Pages/store/company.js");
/* harmony import */ var _user__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./user */ "./resources/js/Pages/store/user.js");
/* harmony import */ var _employee__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./employee */ "./resources/js/Pages/store/employee.js");
/* harmony import */ var _department__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./department */ "./resources/js/Pages/store/department.js");





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,vuex__WEBPACK_IMPORTED_MODULE_4__.createStore)({
  modules: {
    CompanyStore: _company__WEBPACK_IMPORTED_MODULE_0__["default"],
    UserStore: _user__WEBPACK_IMPORTED_MODULE_1__["default"],
    EmployeeStore: _employee__WEBPACK_IMPORTED_MODULE_2__["default"],
    DepartmentStore: _department__WEBPACK_IMPORTED_MODULE_3__["default"]
  }
}));

/***/ }),

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