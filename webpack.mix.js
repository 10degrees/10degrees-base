let mix = require("laravel-mix");
require("laravel-mix-versionhash");
require("laravel-mix-copy-watched");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 | https://stackoverflow.com/questions/55834262/how-to-lint-sass-scss-on-laravel-mix
 */

mix
  .setPublicPath("dist")
  .js("src/js/src/main.js", "dist/js")
  .sass("src/scss/main.scss", "dist/css")
  .sass("src/scss/wp-admin.scss", "dist/css")
  .sass("src/scss/wp-editor.scss", "dist/css")
  .sass("src/scss/wp-login.scss", "dist/css")
  .options({
    processCssUrls: false,
    postCss: [
      require("postcss-css-variables")()
      //   require("stylelint")({
      //     ignoreFiles: "spectre.scss"
      //   }),
      //   require("postcss-reporter")({})
    ]
  })
  .sourceMaps()
  .versionHash({
    delimiter: "-"
  })
  .copyWatched("src/img/*.{jpg,jpeg,png,gif,svg}", "dist/img", {
    base: "src/img"
  });
