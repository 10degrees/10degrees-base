let mix = require("laravel-mix");
require("laravel-mix-versionhash");
require("laravel-mix-copy-watched");
require("laravel-mix-imagemin");
require("laravel-mix-polyfill");

let wpPot = require("wp-pot");

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
    postCss: [require("postcss-css-variables")()]
  })
  .sourceMaps()
  .versionHash({
    delimiter: "-"
  })
  .imagemin("img/**.*", {
    context: "src"
  })
  .copyWatched("src/fonts", "dist/fonts")
  .polyfill({
    enabled: true,
    targets: false
  })
  .copy('node_modules/font-awesome/fonts', 'dist/fonts');

wpPot({
  destFile: "lang/@textdomain.pot",
  domain: "@textdomain",
  package: "@theme"
});
