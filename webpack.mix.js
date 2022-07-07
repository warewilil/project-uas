let mix = require("laravel-mix");

mix
  .js("app/Views/assets/js/app.js", "public/assets/js/app.js")
  .sass("app/Views/assets/scss/app.scss", "public/assets/css/app.css");
