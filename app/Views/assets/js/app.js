import { createPopper } from "@popperjs/core";
try {
  // window.Popper = require('popper.js').default;
  window.$ = window.jQuery = require("jquery");
  window.createPopper = createPopper;

  require("bootstrap");
  require("autoprefixer");
} catch (e) {}
