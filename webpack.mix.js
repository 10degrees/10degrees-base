let mix = require('laravel-mix');
require('laravel-mix-versionhash')
require('laravel-mix-copy-watched');
require('laravel-mix-clean');
require('@tinypixelco/laravel-mix-wp-blocks');

const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');

let wpPot = require('wp-pot');

/**
 * copy-webpack-plugin has to be at a version less than 6,
 * as they removed the copyUnmodified flag in v6.
 * 
 * @link https://github.com/webpack-contrib/copy-webpack-plugin/blob/fb60b9b30c279742c4599def47725fa72b1c7fae/CHANGELOG.md
 */

mix
    .webpackConfig({
        externals: {
            'jquery': 'jQuery'
        }
    })
    .clean()
    .setPublicPath("dist")
    .sass("src/scss/main.scss", "dist/css")
    .sass("src/scss/admin.scss", "dist/css")
    .sass("src/scss/editor-classic.scss", "dist/css")
    .sass("src/scss/gutenberg.scss", "dist/css")
    .sass("src/scss/login.scss", "dist/css")
    .options({
        processCssUrls: false,
        postCss: [require('tailwindcss')]
    })
    .js([
        "src/js/alpine/menu.js",
        "src/js/alpine/posts.js",
        "src/js/alpine/social-share.js",
        "src/js/alpine/ie-modal.js",
        "src/js/main.js"
    ], "dist/js/main.js")
    .js("src/js/admin.js", "dist/js")
    .js([
        "src/js/gutenberg.js",
        "src/js/alpine/posts.js",
        "src/js/alpine/social-share.js",
    ], "dist/js/gutenberg.js")
    .block("src/js/blocks.js", "dist/js", { // WordPress Block Compilation
        outputFormat: 'json',
        combineAssets: true,
    })
    .copyWatched("src/fonts", "dist/fonts")
    .sourceMaps(true, "source-map")
    .webpackConfig({
        plugins: [
            new CopyWebpackPlugin([{ // Copy images
                from: 'src/img',
                to: 'img'
            }], {
                copyUnmodified: true,
            }),
            new ImageminPlugin({ // Minify images
                test: /\.(jpe?g|png|gif|svg)$/i,
            }),
        ]
    });
    
if (mix.inProduction()) {
    mix.versionHash({
        delimiter: "-"
    });
}

wpPot({
    destFile: "lang/@textdomain.pot",
    domain: "@textdomain",
    package: "@theme",
    src: ['**/*.php', '!vendor/**/*.php'],
});