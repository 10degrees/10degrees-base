# 10 Degrees base - Bootstrap

This is a branch of the 10 Degrees base theme using Bootstrap 4.

## Dependencies

Ensure Node is installed. You can install/upgrade using the downloads from [nodejs.org](https://nodejs.org/en/).

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

This is defined in `package.json`, under browserslist. The default is:

    "> 1%",
    "last 2 versions"

Alter as required from the [browserslist](https://github.com/ai/browserslist) syntax.
