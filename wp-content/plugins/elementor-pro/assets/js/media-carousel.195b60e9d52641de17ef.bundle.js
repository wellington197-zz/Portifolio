/*! elementor-pro - v3.3.7 - 15-08-2021 */
(self["webpackChunkelementor_pro"] = self["webpackChunkelementor_pro"] || []).push([["media-carousel"],{

/***/ "../modules/carousel/assets/js/frontend/handlers/media-carousel.js":
/*!*************************************************************************!*\
  !*** ../modules/carousel/assets/js/frontend/handlers/media-carousel.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var _Object$defineProperty = __webpack_require__(/*! @babel/runtime-corejs2/core-js/object/define-property */ "../node_modules/@babel/runtime-corejs2/core-js/object/define-property.js");

var _interopRequireDefault = __webpack_require__(/*! @babel/runtime-corejs2/helpers/interopRequireDefault */ "../node_modules/@babel/runtime-corejs2/helpers/interopRequireDefault.js");

_Object$defineProperty(exports, "__esModule", {
  value: true
});

exports.default = void 0;

var _regenerator = _interopRequireDefault(__webpack_require__(/*! @babel/runtime/regenerator */ "../node_modules/@babel/runtime/regenerator/index.js"));

__webpack_require__(/*! core-js/modules/es6.array.find.js */ "../node_modules/core-js/modules/es6.array.find.js");

var _keys = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/core-js/object/keys */ "../node_modules/@babel/runtime-corejs2/core-js/object/keys.js"));

var _asyncToGenerator2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/asyncToGenerator */ "../node_modules/@babel/runtime-corejs2/helpers/asyncToGenerator.js"));

var _classCallCheck2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/classCallCheck */ "../node_modules/@babel/runtime-corejs2/helpers/classCallCheck.js"));

var _createClass2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/createClass */ "../node_modules/@babel/runtime-corejs2/helpers/createClass.js"));

var _get4 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/get */ "../node_modules/@babel/runtime-corejs2/helpers/get.js"));

var _getPrototypeOf2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/getPrototypeOf */ "../node_modules/@babel/runtime-corejs2/helpers/getPrototypeOf.js"));

var _inherits2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/inherits */ "../node_modules/@babel/runtime-corejs2/helpers/inherits.js"));

var _createSuper2 = _interopRequireDefault(__webpack_require__(/*! @babel/runtime-corejs2/helpers/createSuper */ "../node_modules/@babel/runtime-corejs2/helpers/createSuper.js"));

var _base = _interopRequireDefault(__webpack_require__(/*! ./base */ "../modules/carousel/assets/js/frontend/handlers/base.js"));

var MediaCarousel = /*#__PURE__*/function (_CarouselBase) {
  (0, _inherits2.default)(MediaCarousel, _CarouselBase);

  var _super = (0, _createSuper2.default)(MediaCarousel);

  function MediaCarousel() {
    (0, _classCallCheck2.default)(this, MediaCarousel);
    return _super.apply(this, arguments);
  }

  (0, _createClass2.default)(MediaCarousel, [{
    key: "isSlideshow",
    value: function isSlideshow() {
      return 'slideshow' === this.getElementSettings('skin');
    }
  }, {
    key: "getDefaultSettings",
    value: function getDefaultSettings() {
      var _get2;

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      var defaultSettings = (_get2 = (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "getDefaultSettings", this)).call.apply(_get2, [this].concat(args));

      if (this.isSlideshow()) {
        defaultSettings.selectors.thumbsSwiper = '.elementor-thumbnails-swiper';
        defaultSettings.slidesPerView = {
          desktop: 5,
          tablet: 4,
          mobile: 3
        };
      }

      return defaultSettings;
    }
  }, {
    key: "getSlidesPerViewSettingNames",
    value: function getSlidesPerViewSettingNames() {
      var _this = this;

      if (!this.slideshowElementSettings) {
        this.slideshowElementSettings = ['slides_per_view'];
        var activeBreakpoints = elementorFrontend.config.responsive.activeBreakpoints;
        (0, _keys.default)(activeBreakpoints).forEach(function (breakpointName) {
          _this.slideshowElementSettings.push('slides_per_view_' + breakpointName);
        });
      }

      return this.slideshowElementSettings;
    }
  }, {
    key: "getElementSettings",
    value: function getElementSettings(setting) {
      if (-1 !== this.getSlidesPerViewSettingNames().indexOf(setting) && this.isSlideshow()) {
        setting = 'slideshow_' + setting;
      }

      return (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "getElementSettings", this).call(this, setting);
    }
  }, {
    key: "getDefaultElements",
    value: function getDefaultElements() {
      var _get3;

      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      var selectors = this.getSettings('selectors'),
          defaultElements = (_get3 = (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "getDefaultElements", this)).call.apply(_get3, [this].concat(args));

      if (this.isSlideshow()) {
        defaultElements.$thumbsSwiper = this.$element.find(selectors.thumbsSwiper);
      }

      return defaultElements;
    }
  }, {
    key: "getEffect",
    value: function getEffect() {
      if ('coverflow' === this.getElementSettings('skin')) {
        return 'coverflow';
      }

      return (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "getEffect", this).call(this);
    }
  }, {
    key: "getSlidesPerView",
    value: function getSlidesPerView(device) {
      if (this.isSlideshow()) {
        return 1;
      }

      if ('coverflow' === this.getElementSettings('skin')) {
        return this.getDeviceSlidesPerView(device);
      }

      return (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "getSlidesPerView", this).call(this, device);
    }
  }, {
    key: "getSwiperOptions",
    value: function getSwiperOptions() {
      var options = (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "getSwiperOptions", this).call(this);

      if (this.isSlideshow()) {
        options.loopedSlides = this.getSlidesCount();
        delete options.pagination;
        delete options.breakpoints;
      }

      return options;
    }
  }, {
    key: "onInit",
    value: function () {
      var _onInit = (0, _asyncToGenerator2.default)( /*#__PURE__*/_regenerator.default.mark(function _callee() {
        var _this2 = this;

        var slidesCount, elementSettings, loop, breakpointsSettings, breakpoints, desktopSlidesPerView, thumbsSliderOptions, Swiper;
        return _regenerator.default.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                (0, _get4.default)((0, _getPrototypeOf2.default)(MediaCarousel.prototype), "onInit", this).call(this);
                slidesCount = this.getSlidesCount();

                if (!(!this.isSlideshow() || 1 >= slidesCount)) {
                  _context.next = 4;
                  break;
                }

                return _context.abrupt("return");

              case 4:
                elementSettings = this.getElementSettings(), loop = 'yes' === elementSettings.loop, breakpointsSettings = {}, breakpoints = elementorFrontend.config.responsive.activeBreakpoints, desktopSlidesPerView = this.getDeviceSlidesPerView('desktop');
                (0, _keys.default)(breakpoints).forEach(function (breakpointName) {
                  breakpointsSettings[breakpoints[breakpointName].value] = {
                    slidesPerView: _this2.getDeviceSlidesPerView(breakpointName),
                    spaceBetween: _this2.getSpaceBetween(breakpointName)
                  };
                });
                thumbsSliderOptions = {
                  slidesPerView: desktopSlidesPerView,
                  initialSlide: this.getInitialSlide(),
                  centeredSlides: elementSettings.centered_slides,
                  slideToClickedSlide: true,
                  spaceBetween: this.getSpaceBetween(),
                  loopedSlides: slidesCount,
                  loop: loop,
                  breakpoints: breakpointsSettings,
                  handleElementorBreakpoints: true
                };
                Swiper = elementorFrontend.utils.swiper;
                _context.next = 10;
                return new Swiper(this.elements.$thumbsSwiper, thumbsSliderOptions);

              case 10:
                this.swiper.controller.control = this.thumbsSwiper = _context.sent;
                // Expose the swiper instance in the frontend
                this.elements.$thumbsSwiper.data('swiper', this.thumbsSwiper);
                this.thumbsSwiper.controller.control = this.swiper;

              case 13:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function onInit() {
        return _onInit.apply(this, arguments);
      }

      return onInit;
    }()
  }]);
  return MediaCarousel;
}(_base.default);

exports.default = MediaCarousel;

/***/ })

}]);
//# sourceMappingURL=media-carousel.195b60e9d52641de17ef.bundle.js.map