"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_components_PasswordField_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/components/PasswordField.vue?vue&type=script&lang=js":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/components/PasswordField.vue?vue&type=script&lang=js ***!
  \*************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  setup: function setup() {
    var inputPass = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
    var showPassword = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(false);

    function togglePassword() {
      if (inputPass.value.type === "password") {
        inputPass.value.type = "text";
      } else {
        inputPass.value.type = "password";
      }

      showPassword.value = !showPassword.value;
    }

    return {
      inputPass: inputPass,
      togglePassword: togglePassword,
      showPassword: showPassword
    };
  },
  props: ["modelValue", "placeholder", "label", "type", "helper", "errorMessage", "name", "type", "required"]
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/components/PasswordField.vue?vue&type=template&id=9b83d562":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/components/PasswordField.vue?vue&type=template&id=9b83d562 ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "w-full"
};
var _hoisted_2 = {
  "class": "w-full flex justify-between relative"
};
var _hoisted_3 = ["for"];
var _hoisted_4 = {
  key: 0,
  "class": "text-sm px-4 text-gray-500 absolute right-0 bottom-0"
};
var _hoisted_5 = {
  className: "flex items-center  bg-white border border-gray-500 rounded-xl px-2 py-1 relative marker:focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
};
var _hoisted_6 = ["placeholder", "value", "required"];
var _hoisted_7 = {
  className: " absolute right-2",
  title: "click to show or hide password"
};

var _hoisted_8 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  "class": "h-5 w-5",
  viewBox: "0 0 20 20",
  fill: "currentColor"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M10 12a2 2 0 100-4 2 2 0 000 4z"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  "fill-rule": "evenodd",
  d: "M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z",
  "clip-rule": "evenodd"
})], -1
/* HOISTED */
);

var _hoisted_9 = [_hoisted_8];

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  "class": "h-5 w-5",
  viewBox: "0 0 20 20",
  fill: "currentColor"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  "fill-rule": "evenodd",
  d: "M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z",
  "clip-rule": "evenodd"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  d: "M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"
})], -1
/* HOISTED */
);

var _hoisted_11 = [_hoisted_10];
var _hoisted_12 = {
  key: 0,
  "class": "text-red-600 mt-2"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _$props$errorMessage;

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
    "for": $props.name,
    "class": "text-lg px-2"
  }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.label), 9
  /* TEXT, PROPS */
  , _hoisted_3), $props.helper ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.helper), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    id: "password",
    ref: "inputPass",
    type: "password",
    placeholder: $props.placeholder,
    "class": "w-full px-2 py-2 placeholder-gray-300 focus:outline-none focus:no-underline",
    value: $props.modelValue,
    onInput: _cache[0] || (_cache[0] = function ($event) {
      return _ctx.$emit('update:modelValue', $event.target.value);
    }),
    required: $props.required
  }, null, 40
  /* PROPS, HYDRATE_EVENTS */
  , _hoisted_6), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["eye-open", !$setup.showPassword && 'hidden']),
    onClick: _cache[1] || (_cache[1] = function () {
      return $setup.togglePassword && $setup.togglePassword.apply($setup, arguments);
    })
  }, _hoisted_9, 2
  /* CLASS */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["eye-close", $setup.showPassword && 'hidden']),
    onClick: _cache[2] || (_cache[2] = function () {
      return $setup.togglePassword && $setup.togglePassword.apply($setup, arguments);
    })
  }, _hoisted_11, 2
  /* CLASS */
  )])]), ((_$props$errorMessage = $props.errorMessage) !== null && _$props$errorMessage !== void 0 ? _$props$errorMessage : null) ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("p", _hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errorMessage), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]);
}

/***/ }),

/***/ "./resources/js/Pages/components/PasswordField.vue":
/*!*********************************************************!*\
  !*** ./resources/js/Pages/components/PasswordField.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PasswordField_vue_vue_type_template_id_9b83d562__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PasswordField.vue?vue&type=template&id=9b83d562 */ "./resources/js/Pages/components/PasswordField.vue?vue&type=template&id=9b83d562");
/* harmony import */ var _PasswordField_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PasswordField.vue?vue&type=script&lang=js */ "./resources/js/Pages/components/PasswordField.vue?vue&type=script&lang=js");
/* harmony import */ var _Users_jsalac_OneDrive_OneDrive_Deloitte_O365D_projects_empdir_api_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_Users_jsalac_OneDrive_OneDrive_Deloitte_O365D_projects_empdir_api_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_PasswordField_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_PasswordField_vue_vue_type_template_id_9b83d562__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/components/PasswordField.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/components/PasswordField.vue?vue&type=script&lang=js":
/*!*********************************************************************************!*\
  !*** ./resources/js/Pages/components/PasswordField.vue?vue&type=script&lang=js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_PasswordField_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_PasswordField_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./PasswordField.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/components/PasswordField.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/components/PasswordField.vue?vue&type=template&id=9b83d562":
/*!***************************************************************************************!*\
  !*** ./resources/js/Pages/components/PasswordField.vue?vue&type=template&id=9b83d562 ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_PasswordField_vue_vue_type_template_id_9b83d562__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_PasswordField_vue_vue_type_template_id_9b83d562__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./PasswordField.vue?vue&type=template&id=9b83d562 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/components/PasswordField.vue?vue&type=template&id=9b83d562");


/***/ })

}]);