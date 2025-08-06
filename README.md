 <img src="https://raw.githubusercontent.com/10degrees/10degrees-base/master/src/img/logo.svg?sanitize=true" height="150px" width="150">

# 10 Degrees base WordPress theme

The 10 Degrees base WordPress theme is intended as a quick-start for developers and requires configuration before using. It uses a number of concepts from Laravel, and aims to make development more standardised and accessible. Where possible, [PSR-2](https://www.php-fig.org/psr/psr-2/) style guidelines are mandated with a custom ruleset.

* CSS: SASS preprocessor for CSS
* JavaScript: ES6 ready
* PHP: Namespaces and autoloader with many asbtractions and helper functions
* PHP: [base.php](base.php) wrapper, originally implemented by [Sage theme](https://roots.io/sage/)
* WP CLI block quickstart command

## Requirements

* WordPress >= 5.6
* PHP >= 7.0
* Composer
* Node

Dependencies are managed through [Composer](https://getcomposer.org/) and [Node](https://nodejs.org). Please ensure both are installed.

## Installation

### Via Composer

1) Navigate to themes folder
2) Run `composer create-project 10degrees/10degrees-base [name-of-project]` changing the name of the project
3) The script will install the theme and composer dependencies
4) The script will search/replace for @textdomain and @theme placeholders. The `@themedomain` will be "name-of-project" and the `@theme` name will be "Name Of Project"
5) The script installs npm dependencies

## Theme Setup

From the theme root folder, run:

* `composer install` 
    * this will already have run if you have added `10degrees/10degrees-base` as part of a site-wide composer-based install. For 10 Degrees developers, this is already included as part of our `10degrees-alpha` master install.
* `npm install`

### Placeholders

Find and replace `@textdomain` and `@theme` placeholders in order to set the theme's text domain and name as required.

## Compiling assets

Assets are edited in `src` and compiled to `dist`. Files are given a cache-busting version when compiled for production only. Use `npm run watch` and `npm run dev` when compiling for development. Use `npm run production` when compiling for production.

## Browser support

All modern browsers.
