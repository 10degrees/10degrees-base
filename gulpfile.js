// gulpfile
// Config for 'gulp' task runner - gulpjs.com
//
// Ref: https://markgoodyear.com/2014/01/getting-started-with-gulp/
//
// Load plugins
// Here we list all the plugins we'll be using, alphabetically please :)
// All plugins will be installed via npm on user's system. 'npm install' will read 'package.json'
// process.env.DISABLE_NOTIFIER = true;
var gulp = require("gulp"),
    autoprefixer = require("gulp-autoprefixer"),
    concat = require("gulp-concat"),
    minifycss = require("gulp-clean-css"),
    imagemin = require("gulp-imagemin"),
    path = require("path"),
    rename = require("gulp-rename"),
    sass = require("gulp-sass"),
    sourcemaps = require("gulp-sourcemaps"),
    wpPot = require("gulp-wp-pot"),
    svgmin = require("gulp-svgmin"),
    uglify = require("gulp-uglify"),
    rev = require("gulp-rev"),
    clean = require("gulp-clean");

// Process the main CSS file
// autoprefixer must preceed sourcemap, otherwise gulp will error
gulp.task("main", function() {
    // This deletes compiled CSS every time
    gulp.src("./assets/css/main*", { read: false }).pipe(clean());
    gulp.src("./assets/css/maps/main*", { read: false }).pipe(clean());
    // Then we create a new, versioned compiled CSS
    return gulp
        .src("./src/scss/main.scss")
        .pipe(sourcemaps.init())
        .pipe(
            sass({
                outputStyle: "expanded",
                sourcemap: true
            }).on("error", sass.logError)
        )
        .pipe(autoprefixer())
        .pipe(minifycss())
        .pipe(rev())
        .pipe(sourcemaps.write("./maps"))
        .pipe(gulp.dest("./assets/css"))
        .pipe(
            rename(function(path) {
                path.dirname += "/css";
            })
        )
        .pipe(
            rev.manifest({
                base: "./assets",
                merge: true
            })
        )
        .pipe(gulp.dest("./assets/css"));
});

// Process the wp-admin CSS file
gulp.task("wp-admin", function() {
    return gulp
        .src("./src/scss/wp-admin.scss")
        .pipe(
            sass({
                outputStyle: "expanded",
                sourcemap: true
            }).on("error", sass.logError)
        )
        .pipe(autoprefixer())
        .pipe(minifycss())
        .pipe(gulp.dest("./assets/css"));
});

// Process the wp-editor-styles CSS file
gulp.task("wp-editor", function() {
    return gulp
        .src("./src/scss/wp-editor.scss")
        .pipe(
            sass({
                outputStyle: "expanded",
                sourcemap: true
            }).on("error", sass.logError)
        )
        .pipe(autoprefixer())
        .pipe(minifycss())
        .pipe(gulp.dest("./assets/css"));
});

// Process the wp-login-styles CSS file
gulp.task("wp-login", function() {
    return gulp
        .src("./src/scss/wp-login.scss")
        .pipe(
            sass({
                outputStyle: "expanded",
                sourcemap: true
            }).on("error", sass.logError)
        )
        .pipe(autoprefixer())
        .pipe(minifycss())
        .pipe(gulp.dest("./assets/css"));
});

// Process Old IE CSS file
gulp.task("old-ie", function() {
    return gulp
        .src("./src/scss/ie.scss")
        .pipe(
            sass({
                outputStyle: "expanded",
                sourcemap: true
            }).on("error", sass.logError)
        )
        .pipe(autoprefixer())
        .pipe(minifycss())
        .pipe(gulp.dest("./assets/css"));
});

// Scripts task
// Combine all js files to a single file, output as minified & non-minified
gulp.task("scripts", function() {
    gulp.src("./assets/js/main*.js", { read: false }).pipe(clean());
    return (
        gulp
            .src([
                "src/js/lib/Modernizr.js",
                "src/js/lib/slick.js",
                // "src/js/lib/google-map-init.js",
                // "src/js/lib/jquery.accordion.js",
                // "src/js/lib/jquery.magnific-popup.js",
                "src/js/src/*.js"
            ])
            .pipe(concat("main.js"))
            // .pipe(gulp.dest("assets/js"))
            .pipe(uglify())
            .pipe(gulp.dest("assets/js"))
    );
});

// Optimise images, lossless
// PNG, JPEG, GIF and SVG
gulp.task("images", function() {
    return gulp
        .src("./src/img/*")
        .pipe(imagemin())
        .pipe(gulp.dest("./assets/img"));
});

// Copy fonts from src to assets
gulp.task("fonts", function() {
    return gulp.src("./src/fonts/*").pipe(gulp.dest("./assets/fonts"));
});

// Generate
gulp.task("wppot", function() {
    return gulp
        .src("**/*.php")
        .pipe(
            wpPot({
                domain: "@textdomain",
                package: "@theme"
            })
        )
        .pipe(gulp.dest("lang/@textdomain.pot"));
});

// Default task
// What happens when user runs 'gulp'
gulp.task("default", function() {
    gulp.start(
        "main",
        "wp-admin",
        "wp-editor",
        "wp-login",
        "scripts",
        "images",
        "fonts",
        "wppot"
    );
});

// Watch task
// What happens when user runs 'gulp watch'
gulp.task("watch", function() {
    // Watch .scss files
    gulp.watch("./src/scss/**/*.scss", ["main", "wp-editor"]);

    // Watch .js files
    gulp.watch("./src/js/src/**/*.js", ["scripts"]);

    // Watch .php files
    //gulp.watch("./*.php", ["markup"]);
});
