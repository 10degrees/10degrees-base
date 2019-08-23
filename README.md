# How to use

## Dependencies

These dependencies are required on your computer. This is not a per-theme requirement.

Ensure Node is installed. You can install/upgrade using the MacOS download from [nodejs.org](https://nodejs.org/en/).

## Theme Setup

From the theme root folder, run:

* `composer install`
* `npm install`

## Compiling assets

* `npm run watch` to watch files for compilation on development
* `npm run prod` to compile files for production

Assets are compiled to `/dist`.

### Parameters

Browser support

This is defined in package.json, under browserslist. The default is:

    "> 1%",
    "last 2 versions"

Alter as required from the [browserslist](https://github.com/ai/browserslist) syntax.

## To Do

* Rewrite and compile JS, changing dependencies to node modules where appropriate
* Add Babel to polyfill JS support for older browsers
* Add Bootstrap SCSS components via node, and compile
* Fix multiple CSS and JS files in `/dist` when using `npm run watch`