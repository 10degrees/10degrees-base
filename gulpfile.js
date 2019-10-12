// Initialize modules
//https://coder-coder.com/gulp-4-walk-through/
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require("gulp");
// Importing all the Gulp-related packages we want to use
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const rev = require("gulp-rev");
const del = require("del");
var replace = require("gulp-replace");

// File paths
const srcFiles = {
  scssPath: "src/scss/**/*.scss",
  jsPath: "src/js/**/*.js"
};

// Sass task: compiles the style.scss file into style.css
function buildCSS() {
  return src(srcFiles.scssPath)
    .pipe(sourcemaps.init()) // initialize sourcemaps first
    .pipe(sass()) // compile SCSS to CSS
    .pipe(postcss([autoprefixer(), cssnano()])) // PostCSS plugins
    .pipe(sourcemaps.write("maps")) // write sourcemaps file in current directory
    .pipe(rev())
    .pipe(dest("dist/css")) // put final CSS in dist folder
    .pipe(rev.manifest())
    .pipe(dest("dist"));
}

// JS task: concatenates and uglifies JS files to script.js
function buildJS() {
  return src([
    srcFiles.jsPath
    //,'!' + 'includes/js/jquery.min.js', // to exclude any specific files
  ])
    .pipe(concat("all.js"))
    .pipe(uglify())
    .pipe(dest("dist"));
}

function cleanCSS() {
  return del(["dist/css/**/*.css", "dist/css/**/*.map"]);
}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
  watch([srcFiles.scssPath], series(cleanCSS, buildCSS));
}

// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.default = series(cleanCSS, parallel(buildCSS), watchTask);
exports.clean = series(cleanCSS);
