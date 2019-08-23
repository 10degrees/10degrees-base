# How to use

### Dependencies

These dependencies are required on your computer. This is not a per-theme requirement.

1) Ensure Node is installed. You can install/upgrade using the MacOS download from [nodejs.org](https://nodejs.org/en/).

2) Ensure gulp is installed globally: `npm install gulp -g`

### Theme Setup

1) From the theme root folder, run `npm install`

2) Set `projectURL` in `gulpfile.js`

	Find and replace @textdomain with the textdomain
	Find and replace @theme with the theme name

3) Adjust scripts you need to compile in the gulp `scripts` task

4) Run one of the following to

	`gulp` (for a full build)
	`gulp watch` only runs the `sass-main` and `scripts` tasks.
	`gulp watch-reload` only runs the `sass-main` and `scripts` tasks. Uses BrowserSync to live reload changes on `localhost:3000`

There is no need to touch anything in /assets - this is now a dir of compiled files.

* Place all files in the appropriate folder in /src, and they will be processed and added to /assets.
* There is no SVG folder in /assets. icons.svg is processed into /assets/img
* Style SVG icons in /src/scss/components/_svg-icons.scss

### Parameters

Browser support

This is defined in package.json, under browserslist. The default is:

    "> 1%",
    "last 2 versions"

Alter as required from the [browserslist](https://github.com/ai/browserslist) syntax.