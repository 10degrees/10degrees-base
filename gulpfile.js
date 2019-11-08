// Developed from https://coder-coder.com/gulp-4-walk-through/

// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require("gulp");
// Importing all the Gulp-related packages
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const imagemin = require("gulp-imagemin");
const wpPot = require("gulp-wp-pot");
const rev = require("gulp-rev");
const del = require("del");
const rename = require("gulp-rename");
const notify = require("gulp-notify");
const replace = require("gulp-replace");
const rollup = require("gulp-better-rollup");
const babel = require("rollup-plugin-babel");
//const uglify = require("rollup-plugin-uglify");

const {terser} = require("rollup-plugin-terser");

// File paths
const srcFiles = {
  scssPath: "src/scss/**/*.scss",
  jsPath: ["src/js/main.js", "src/js/admin.js", "src/js/editor-block.js"],
  imgPath: "src/img/**/*",
  fontPath: "src/fonts/**/*",
  phpPath: "**/*.php"
};

// rev-manifest.json destination path
const manifestDest = "dist/rev-manifest.json";

// Build CSS from SCSS
async function buildCSS() {
  return src(srcFiles.scssPath)
    .pipe(sourcemaps.init()) // initialize sourcemaps
    .pipe(sass()) // compile SCSS to CSS
    .pipe(postcss([autoprefixer(), cssnano()])) // PostCSS plugins
    .pipe(rev())
    .pipe(sourcemaps.write("maps")) // write sourcemaps file in current directory
    .pipe(dest("dist/css")) // put final CSS in dist folder
    .pipe(
      rename(function(path) {
        path.dirname = "/css/" + path.dirname;
      })
    )
    .pipe(
      rev.manifest(manifestDest, {
        base: "dist",
        merge: true
      })
    )
    .pipe(dest("dist"));
}

// Build browser-compatible JS from source JS
async function oldBuildJS() {
  return (
    src([srcFiles.jsPath])
      // .pipe(concat())
      .pipe(babel())
      // .pipe(uglify())
      .pipe(rev())
      .pipe(dest("dist/js"))
      .pipe(
        rename(function(path) {
          path.dirname = "/js/" + path.dirname;
        })
      )
      .pipe(
        rev.manifest(manifestDest, {
          base: "dist",
          merge: true
        })
      )
      .pipe(dest("dist"))
  );
}

// Build browser-compatible JS from source JS
async function buildJS() {
  return (
    src(srcFiles.jsPath)
      .pipe(sourcemaps.init())
      .pipe(
        rollup(
          {
            // There is no `input` option as rollup integrates into the gulp pipeline
            plugins: [babel()] 
          },
          {
            // Rollups `sourcemap` option is unsupported. Use `gulp-sourcemaps` plugin instead
            format: "cjs"
          }
        )
      )
      // inlining the sourcemap into the exported .js file
      .pipe(rev())
      .pipe(dest("dist/js"))
      .pipe(
        rename(function(path) {
          path.dirname = "/js/" + path.dirname;
        })
      )
      .pipe(
        rev.manifest(manifestDest, {
          base: "dist",
          merge: true
        })
      )
      .pipe(sourcemaps.write())
      .pipe(dest("dist"))
  );
}

// Compress and copy images
async function compressImages() {
  return src([srcFiles.imgPath])
    .pipe(imagemin())
    .pipe(dest("./dist/img"));
}

// Copy fonts
async function copyFonts() {
  return src([srcFiles.fontPath]).pipe(dest("./dist/fonts"));
}

// Build .pot for string translation
async function buildPot() {
  return src([srcFiles.phpPath])
    .pipe(
      wpPot({
        domain: "@textdomain",
        package: "@theme"
      })
    )
    .pipe(dest("lang/@textdomain.pot"));
}

// Delete compiled CSS, JS and source maps in /dist
function cleanDistCssJs() {
  return del([
    "dist/css/**/*.css",
    "dist/css/**/*.map",
    "dist/js/**/*.js",
    "dist/js/**/*.map"
  ]);
}

// Delete dist/maps/admin and dist/maps/theme
function cleanDistMapsDirs() {
  return del(["dist/css/maps/admin", "dist/css/maps/theme"]);
}

// Delete images in /dist
function cleanDistImages() {
  return del(["dist/img/*"]);
}
// Delete fonts in /dist
function cleanDistFonts() {
  return del(["dist/fonts/*"]);
}
// Delete .pot in /lang
function cleanLang() {
  return del(["lang/*"]);
}

// Watch files for changes
async function watchTask() {
  watch(
    [
      srcFiles.scssPath,
      "src/js/main.js",
      "src/js/admin.js",
      "src/js/editor-block.js"
    ],
    series([
      cleanDistCssJs,
      buildCSS,
      buildJS,
      cleanDistMapsDirs,
      notifyWatchTask
    ])
  );
}

// Notify - Default
async function notifyDefaultTask() {
  notify({
    title: "Gulp task complete",
    message: "Compiled CSS and JS, and rebuilt assets 💥"
  }).write("");
}

// Notify - Watch
async function notifyWatchTask() {
  notify({
    title: "Gulp watch task complete",
    message: "Compiled CSS and JS 😎"
  }).write("");
}

/*
Export default Gulp task
Usage: "gulp"
This task does everything to build production-ready assets.
To add images, fonts or to build the .pot, you need to run this task.
*/
exports.default = series(
  parallel(cleanDistCssJs, cleanDistImages, cleanDistFonts, cleanLang),
  buildJS,
  buildCSS,
  compressImages,
  copyFonts,
  buildPot,
  cleanDistMapsDirs,
  notifyDefaultTask
);
/*
Export watch Gulp task
Usage: "gulp watch"
This task only builds compiled CSS and JS
watchTask() runs the actual watch function
*/
exports.watch = series(
  cleanDistCssJs,
  buildCSS,
  buildJS,
  watchTask,
  notifyWatchTask
);

// exports.rollup = series(rollupJS);
