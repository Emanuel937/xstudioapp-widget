/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/widgets/productlist.js"
/*!***************************************!*\
  !*** ./src/js/widgets/productlist.js ***!
  \***************************************/
() {

eval("{jQuery(document).ready(function($){\n\n    // Tabs filter\n    const xstudioappProductList = ()=>{\n\n        document.querySelectorAll('.xsa-product-tabs').forEach(function (tabsWrapper) {\n\n            const buttons = tabsWrapper.querySelectorAll('.xsa-tab-button');\n            const wrapper = tabsWrapper.closest('.xsa-product-list-wrapper');\n            const items   = wrapper.querySelectorAll('.xsa-product-item');\n\n            buttons.forEach(function (btn) {\n                btn.addEventListener('click', function () {\n                    const catId = this.getAttribute('data-category');\n\n                    buttons.forEach(b => b.classList.remove('active'));\n                    this.classList.add('active');\n\n                    items.forEach(function (item) {\n                        const cats = item.getAttribute('data-category-ids').split(',');\n                        if (cats.includes(catId)) {\n                            item.style.display = '';\n                        } else {\n                            item.style.display = 'none';\n                        }\n                    });\n                });\n            });\n        });\n\n    // slider button animations\n\n  \n    const wrappers = document.querySelectorAll('.xsa-has-slider');\n\n          wrappers.forEach((wrapper)=>{\n            \n            // itens to apply transform: translateX();\n           let index          = 0;\n           const list         =   wrapper.querySelectorAll(\".xsa-product-item\");\n           const nextButton   =   wrapper.querySelector(\".xsa-slider-nav .xsa-next\");\n           const prevButton   =   wrapper.querySelector(\".xsa-slider-nav .xsa-prev\");\n    \n           const update = ()=>{\n\n             list.forEach((iten)=>{\n                  const offset          = -(index * iten.offsetWidth);\n                  iten.style.transform  = `translateX(${offset}px)`; \n                  iten.style.transition = \"transform 0.3s ease\";\n             });\n             console.log(index);\n           }\n\n           const nextItem =()=>{\n                index = (index + 1) % list.length; \n                update();\n           }\n\n           const prevItem =()=>{\n\n                index = (index -1 + list.length) % list.length;\n                update();\n           }\n\n\n           nextButton.addEventListener(\"click\", nextItem);\n           prevButton.addEventListener(\"click\", prevItem)\n\n          });\n    }\n\n    // ---------------------------------------------------------\n    if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {\n            elementorFrontend.hooks.addAction('frontend/element_ready/ProductList.default', \n            function($scope){\n            xstudioappProductList();\n            });\n    }\n\n});\n\n\n//# sourceURL=webpack:///./src/js/widgets/productlist.js?\n}");

/***/ },

/***/ "./src/scss/widgets/productlist.scss"
/*!*******************************************!*\
  !*** ./src/scss/widgets/productlist.scss ***!
  \*******************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack:///./src/scss/widgets/productlist.scss?\n}");

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_modules__["./src/js/widgets/productlist.js"](0,{},__webpack_require__);
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scss/widgets/productlist.scss"](0,__webpack_exports__,__webpack_require__);
/******/ 	
/******/ })()
;