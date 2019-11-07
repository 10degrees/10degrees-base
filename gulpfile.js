// Forked from https://coder-coder.com/gulp-4-walk-through/

// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require("gulp");
// Importing all the Gulp-related packages
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const babel = require("gulp-babel");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const imagemin = require("gulp-imagemin");
const wpPot = require("gulp-wp-pot");
const rev = require("gulp-rev");
const del = require("del");
const rename = require("gulp-rename");
const notify = require("gulp-notify");
var replace = require("gulp-replace");

// File paths
const srcFiles = {
  scssPath: "src/scss/**/*.scss",
  jsPath: "src/js/theme/*.js",
  imgPath: "src/img/**/*",
  fontPath: "src/fonts/**/*",
  phpPath: "**/*.php"
};

// Build CSS from SCSS
async function buildCSS() {
  return src(srcFiles.scssPath)
    .pipe(sourcemaps.init()) // initialize sourcemaps first
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
      rev.manifest("dist/rev-manifest.json", {
        base: "dist",
        merge: true
      })
    )
    .pipe(dest("dist"));
}

// Build browser-compatible JS from source JS
async function buildJS() {
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
        rev.manifest("dist/rev-manifest.json", {
          base: "dist",
          merge: true
        })
      )
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

// Build .pot
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

// Delete compiled files in /dist
function cleanDist() {
  return del([
    "dist/css/**/*.css",
    "dist/css/**/*.map",
    "dist/js/**/*.js",
    "dist/js/**/*.map",
    "dist/img/*",
    "dist/fonts/*"
  ]);
}

// Watch task: watch files for changes
function watchTask() {
  watch([srcFiles.scssPath], series([cleanDist]));
}

function notifyTask() {
  notify({
    title: "My notification",
    message: "Hello, there!"
  });
}

// Export default Gulp task
// Run with "gulp"
exports.default = series([cleanDist, buildJS, buildCSS]);
// Export watch Gulp task
// Run with "gulp watch"
exports.watch = series(cleanDist, parallel([buildCSS]), watchTask);
