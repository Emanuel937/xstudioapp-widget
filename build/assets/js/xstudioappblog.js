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

/***/ "./src/js/widgets/xstudioappblog.js"
/*!******************************************!*\
  !*** ./src/js/widgets/xstudioappblog.js ***!
  \******************************************/
() {

eval("{jQuery(document).ready(function ($) {\n\n    const xstudioapp_blog = () => {\n\n        // ---------------------------------------------------------\n        // DOM ELEMENTS\n        // ---------------------------------------------------------\n\n        // All thumbnails\n        const thumbnails = document.querySelectorAll('.thumbnail');\n\n        // All slides\n        const slides = document.querySelectorAll('.slide');\n\n        // Elementor input values (always strings → convert to number)\n        const maxCatTitle = parseInt(document.querySelector('input[name=\"max_cat_title\"]')?.value || 0);\n        const maxCatDescription = parseInt(document.querySelector('input[name=\"max_cat_description\"]')?.value || 0);\n\n        // All titles and descriptions inside slides\n        const titles = document.querySelectorAll('.xsa_blog .widget-slides .slide .slide-content h3');\n        const descriptions = document.querySelectorAll('.xsa_blog .widget-slides .slide .slide-content p');\n\n\n        // ---------------------------------------------------------\n        // TEXT TRUNCATION FUNCTION\n        // ---------------------------------------------------------\n        const truncateText = (element, limit) => {\n            if (!element) return;\n\n            const text = element.textContent.trim();\n\n            // If limit is valid and text is longer than limit → truncate\n            if (limit > 0 && text.length > limit) {\n                element.textContent = text.substring(0, limit) + '...';\n            }\n        };\n\n\n        // ---------------------------------------------------------\n        // APPLY TRUNCATION TO ALL TITLES & DESCRIPTIONS\n        // ---------------------------------------------------------\n        titles.forEach(title => truncateText(title, maxCatTitle));\n        descriptions.forEach(desc => truncateText(desc, maxCatDescription));\n\n\n        // ---------------------------------------------------------\n        // THUMBNAIL CLICK → SWITCH SLIDE\n        // ---------------------------------------------------------\n        thumbnails.forEach(thumb => {\n            thumb.addEventListener('click', () => {\n\n                // Get target slide index\n                const targetIndex = thumb.getAttribute('data-slide-target');\n\n                // Remove active class from all slides\n                slides.forEach(slide => slide.classList.remove('is-active'));\n\n                // Activate the selected slide\n                const targetSlide = document.querySelector(`.slide[data-slide-index=\"${targetIndex}\"]`);\n                if (targetSlide) {\n                    targetSlide.classList.add('is-active');\n                }\n            });\n        });\n    };\n\n\n    // ---------------------------------------------------------\n    // ELEMENTOR HOOK → RUN SCRIPT WHEN WIDGET IS LOADED\n    // ---------------------------------------------------------\n   if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {\n        elementorFrontend.hooks.addAction('frontend/element_ready/xstudioapp_testimonials.default', function($scope){\n            xstudioapp_blog();\n        });\n    }\n\n});\n\n\n//# sourceURL=webpack:///./src/js/widgets/xstudioappblog.js?\n}");

/***/ },

/***/ "./src/scss/widgets/xstudioappblog.scss"
/*!**********************************************!*\
  !*** ./src/scss/widgets/xstudioappblog.scss ***!
  \**********************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack:///./src/scss/widgets/xstudioappblog.scss?\n}");

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
/******/ 	__webpack_modules__["./src/js/widgets/xstudioappblog.js"](0,{},__webpack_require__);
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scss/widgets/xstudioappblog.scss"](0,__webpack_exports__,__webpack_require__);
/******/ 	
/******/ })()
;