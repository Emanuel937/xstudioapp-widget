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

/***/ "./src/js/widgets/xstudioapptestimonials.js"
/*!**************************************************!*\
  !*** ./src/js/widgets/xstudioapptestimonials.js ***!
  \**************************************************/
() {

eval("{jQuery(document).ready(function($){\n    \n  \n    function runCode(){\n     \n        const modele_type            = document.querySelector('#xstudioapp_testemonial_style').getAttribute('data-info');\n        const container              = document.querySelector(\".-xstudioapp-widget-testimonial-container\");\n        const name                   = container.querySelector(\"#name\");\n        const quote                  = container.querySelector(\"#quote\");\n        const designation            = container.querySelector(\"#designation\");\n        const imgs                   = modele_type == \"style_2\" ? container.querySelectorAll(\".img\") : container.querySelector('#image-container');\n        \n        // ====================================================================================================\n        // button prev and next\n        // ====================================================================================================\n\n       const prevButton             = container.querySelector('#prev-button');\n       const nextButton             = container.querySelector('#next-button');\n\n       let   activeIndex            = 0 ;\n       const testemonials           = document.querySelector(\"#xstudioapp_testemonial\").getAttribute('data-info');\n       const testimonials_array     = JSON.parse(testemonials);\n\n    // ==========================================================================================================\n    // (x + N) % N -> never get the negative result ....\n    // ==========================================================================================================\n\n    const loopFormule = (x)=> {\n\n        return (activeIndex + x + testimonials_array.length ) %  testimonials_array.length;\n    }\n\n\n    // ===========================================================================================================\n    //  The namition for each word  \n    //  animation set on every xstudioapp-widget-word css class \n    //   ---------------------------------------------------------------------------------------------------------\n\n    const animateWords = ()=> {\n\n        const words = quote.querySelectorAll('.-xstudioapp-widget-word');\n        words.forEach((word, index) => {\n            word.style.opacity = '0';\n            word.style.filter = 'blur(10px)';\n            setTimeout(() => {\n                 word.style.transition = 'opacity 0.2s ease-in-out, transform 0.2s ease-in-out, filter 0.2s ease-in-out';\n                word.style.opacity = '1';\n    \n                word.style.filter = 'blur(0)';\n            }, index * 20);\n        });\n    }\n\n\n    const updateTestimonial = (direction)=>\n      {\n          \n          activeIndex = loopFormule(direction);\n          // =============================\n          //  setting the data to the node \n          //===============================\n\n          name.textContent  = testimonials_array[activeIndex].name;\n     \n          if(modele_type == \"style_2\"){\n             \n             let prevActiveIndex = loopFormule(-1);\n             let nextActiveIndex = loopFormule(-2);\n\n             requestAnimationFrame(() => {\n                imgs.forEach(img => {\n                    img.style.transition = 'opacity 4.5s ease, transform 0.5s ease';\n                });\n\n                // LEFT IMAGE\n                imgs[0].src = testimonials_array[prevActiveIndex].src;\n                imgs[0].style.opacity = 0.7;\n                imgs[0].style.transform = 'scale(0.9)';\n\n                // CENTER IMAGE (ACTIVE)\n                imgs[1].src = testimonials_array[activeIndex].src;\n                imgs[1].style.opacity = 1;\n                imgs[1].style.transform = 'scale(1)';\n\n                // RIGHT IMAGE\n                imgs[2].src = testimonials_array[nextActiveIndex].src;\n                imgs[2].style.opacity = 0.7;\n                imgs[2].style.transform = 'scale(0.9)';\n            });\n             \n          }\n          \n          if(modele_type == \"style_1\"){\n            testimonials_array.forEach((testimonial, index) => {\n\n                let img = imgs.querySelector(`[data-index=\"${index}\"]`);\n             \n                if (!img) {\n                    img = document.createElement('img');\n                    img.src = testimonial.src;\n                    img.alt = testimonial.name;\n                    img.classList.add('-xstudioapp-widget-testimonial-image');\n                    img.dataset.index = index;\n                    imgs.appendChild(img);\n                }\n\n                const offset       = index - activeIndex;   \n                const absOffset    = Math.abs(offset);\n                const zIndex       = testimonials_array.length - absOffset;\n                const opacity      =  index === activeIndex ? 1 : 0.7;\n                const scale        = 1 - (absOffset * 0.15);\n                const translateY   = offset === -1 ? '-20%'  : offset === 1 ? '20%'    : '0%';\n                const rotateY      = offset === -1 ? '15deg' : offset === 1 ? '-15deg' : '0deg';\n\n                img.style.zIndex = zIndex;\n                img.style.opacity = opacity;\n                img.style.transform = `translateY(${translateY}) scale(${scale}) rotateY(${rotateY})`;\n        });\n      }\n\n      quote.innerHTML   = testimonials_array[activeIndex].quote.split(' ')\n        .map(word => `<span class=\"-xstudioapp-widget-word\">${word}</span>`).join(' ');\n      animateWords() // run animation \n    }\n      \n       // =====================================\n       // next and prev function \n       // ====================================\n\n       const next = ()=>{\n\n         updateTestimonial(1);\n       }\n      \n\n       const prev = ()=>{\n            updateTestimonial(-1);\n       }\n\n       nextButton.addEventListener(\"click\", next);\n       prevButton.addEventListener(\"click\", prev);\n\n       updateTestimonial(0);   // init the testemonial \n\n       const autoPlay = setInterval(nextButton, 500);   // interval \n\n       [nextButton, prevButton].forEach( btn =>{\n            btn.addEventListener(\"click\", clearInterval(autoPlay));\n       })\n\n  }\n  \n    if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {\n        elementorFrontend.hooks.addAction('frontend/element_ready/xstudioapp_testimonials.default', function($scope){\n           runCode();\n        });\n    }\n\n});\n\n//# sourceURL=webpack:///./src/js/widgets/xstudioapptestimonials.js?\n}");

/***/ },

/***/ "./src/scss/widgets/xstudioapptestimonials.scss"
/*!******************************************************!*\
  !*** ./src/scss/widgets/xstudioapptestimonials.scss ***!
  \******************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack:///./src/scss/widgets/xstudioapptestimonials.scss?\n}");

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
/******/ 	__webpack_modules__["./src/js/widgets/xstudioapptestimonials.js"](0,{},__webpack_require__);
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scss/widgets/xstudioapptestimonials.scss"](0,__webpack_exports__,__webpack_require__);
/******/ 	
/******/ })()
;