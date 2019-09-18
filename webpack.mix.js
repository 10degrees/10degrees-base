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
  .sourceMaps(true, "source-map")
  .setPublicPath("dist")
  .extract()
  .js(["src/js/src/main.js"], "dist/js")
  .sass("src/scss/main.scss", "dist/css")
  .sass("src/scss/wp-admin.scss", "dist/css")
  .sass("src/scss/wp-editor.scss", "dist/css")
  .sass("src/scss/wp-login.scss", "dist/css")
  .options({
    processCssUrls: false,
    postCss: [require("postcss-css-variables")()]
  })
  .imagemin("img/**.*", {
    context: "src"
  })
  .polyfill({
    enabled: true,
    targets: false
  })
  .copyWatched("src/fonts", "dist/fonts")
  .copy("src/js/lib/google-map-init.js", "dist/js")
  .webpackConfig({
    watchOptions: {
      ignored: /node_modules/
    },
    module: {
      rules: [
        {
          test: require.resolve("jquery"),
          use: [
            {
              loader: "expose-loader",
              options: "jQuery"
            },
            {
              loader: "expose-loader",
              options: "$"
            }
          ]
        }
      ]
    }
  });

if (mix.isProduction) {
  mix.versionHash({
    delimiter: "-"
  });
}

wpPot({
  destFile: "lang/@textdomain.pot",
  domain: "@textdomain",
  package: "@theme"
});
