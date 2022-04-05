# Radya is a custom WordPress theme built with a full-site editing features.

This package is based on [`frontend-webpack-boilerplate`](https://github.com/WeAreAthlon/frontend-webpack-boilerplate) by [`WeAreAthlon`](https://github.com/WeAreAthlon)

Table of Contents
=================

   * [Webpack 5 Boilerplate Template](#webpack-5-boilerplate-template)
      * [Features](#features)
      * [Requirements](#requirements)
   * [Setup](#setup)
      * [Installation](#installation)
      * [Define Package Metadata](#define-package-metadata)
   * [Configuration](#configuration)
      * [Environment Configuration](#environment-configuration)
      * [Additional webpack configuration](#additional-webpack-configuration)
   * [Development](#development)
      * [Assets Source](#assets-source)
      * [Build Assets](#build-assets)
         * [One time build assets for development](#one-time-build-assets-for-development)
         * [Build assets and enable source files watcher](#build-assets-and-enable-source-files-watcher)
         * [Start a development server - reloading automatically after each file change.](#start-a-development-server---reloading-automatically-after-each-file-change)
   * [Production](#production)
      * [Build Assets](#build-assets-1)
      * [Get Built Assets](#get-built-assets)
   * [Run Code Style Linters](#run-code-style-linters)
      * [SASS](#sass)
      * [JavaScript](#javascript)
   * [Additional Tools](#additional-tools)
      * [Run Assets Bundle Analyzer](#run-assets-bundle-analyzer)
      * [Continuous Integration](#continuous-integration)

## Features

* **Simple setup** instructions
  * Start development of a project right away with **simple**, **configured**, **linter enabled**, **browser synced** asset files.
* Configuration per **environment**
  * `development` - [`sourcemaps`](https://webpack.js.org/configuration/devtool/), [`browser synced developmentment server`](https://webpack.js.org/configuration/dev-server/)
  * `production` - [`minification`](https://webpack.js.org/plugins/terser-webpack-plugin/), [`sourcemaps`](https://webpack.js.org/configuration/devtool/)
* Configurable **browsers versions support**. It uses [`browserslist`](https://github.com/browserslist/browserslist#full-list) - just specify the browsers you want to support in the `package.json` file for `browserslist`:

```js
"browserslist": [
    "last 2 versions",
    "> 5%"
]
```
* The built CSS / JavaScript files will respect the **configured supported browser versions** using the following tools:
  * [`autoprefixer`](https://github.com/postcss/autoprefixer) - automatically adds vendor prefixes to CSS rules
  * [`babel-preset-env`](https://babeljs.io/docs/en/babel-preset-env) - smart preset that allows you to use the latest JavaScript without needing to micromanage which syntax transforms (*and optionally, browser polyfills*) are needed by your target environment(s).
* Support for **assets optimization** for production environment with ability to configure:
  * **Code Minification** of *JavaScript* and *CSS* processed files.
  * **Optimize Assets Loading** - inline and embed **images** / **fonts** files having file size below a *configurable* threshold value.
  * **Images Optimisation** - optimize `jpeg`, `jpg`, `png`, `gif`, `svg` filesize and loading type via [`imagemin`](https://github.com/imagemin/imagemin). Plugin and Loader for webpack to optimize (*compress*) all images using `imagemin`. Do not worry about size of images, now they are always optimized/compressed.
* Support for **source code syntax style and formatting linters** that analyze source code to flag any programming errors, bugs, stylistic errors or suspicious constructs:
  * **SASS/PostCSS syntax cheker** - you can change or add additional rules in `.sasslintrc` file. Configuration options can be found on [`sass-lint`](https://github.com/sasstools/sass-lint/blob/master/lib/config/sass-lint.yml) documentation.
  * **JavaScript syntax checker** - following the `airbnb` style, you can review and configure the rules in `.eslintrc` file. Configuration options can be found on [`eslint`](https://eslint.org/docs/user-guide/configuring) documentation.
* Latest [Webpack 5](https://github.com/webpack/webpack) - *JavaScript* module bundler.
* Latest [SASS/PostCSS](https://github.com/sass/sass) compiler based on Dart `sass`.
* Latest [Babel 7](https://github.com/babel/babel) (`@babel/core`) - JavaScript compiler - _Use next generation JavaScript, today._
* Configured and ready to use **Webpack Dev Server** plugin for faster local development - [`webpack-dev-server`](https://webpack.js.org/configuration/dev-server/)
* Integration with [Webpack Bundle Analyzer](https://www.npmjs.com/package/webpack-bundle-analyzer) - _Visualize size of webpack output files with an interactive zoomable treemap._

## Requirements

* WordPress 5.9+
* `node` : `^12 || >=14`
* `npm`

# Setup

## Installation

Clone or download this repository, change its name to something else (like, say, `your-project-name`), and then:

1. Search for `'radya'` (inside single quotations) to capture the text domain and replace with: `'your-project-name'`.
2. Search for `radya_` to capture all the functions names and replace with: `your-project-name_`.
3. Search for `Text Domain: radya` in `style.css` and replace with: `Text Domain: your-project-name`.
4. Install all dependencies using `npm install` command. 

```sh 
$ npm install
```

## Define Package Metadata

* Amend `package.json` file and optionally specify:
  * `name` - Name of your project. A name can be optionally prefixed by a scope, e.g. `@myorg/mypackage`.
  * `version` - Specify and maintain a version number indicator for your project code.
  * `author` - Your organisation or just yourself. You can also specify [`contributors`](https://docs.npmjs.com/files/package.json#people-fields-author-contributors).
  * `description` - Short description of your project.
  * `keywords` - Put keywords in it. It’s an array of strings.
  * `repository` - Specify the place where your code lives.
  * `license` - Announce your code license, figure out the license from [Choose an Open Source License](https://choosealicense.com) .
  * `browserslist` - Specify the supported browsers versions - you can refer to [full list](https://github.com/browserslist/browserslist#full-list) of availalbe options.

# Configuration

## Environment Configuration

* Edit the [`config/environment.js`](config/environment.js) if you want to specify:
  * **`server`**: configure development server, specify `host`, `port`. Refer to the full development server configuration options for [`webpack-dev-server`](https://webpack.js.org/configuration/dev-server/).
  * **`limits`**: configure file size thresholds for assets optimizations.
    * Image/Font files size in bytes. Below this value the image file will be served as Data URL (_inline base64_).
  * **`paths`**: `src` or `assets` directories names and file system location.

## Webpack configuration
* `common` - [`config/webpack.config.js`](config/webpack.dev.config.js)
* `development` - [`config/webpack.dev.config.js`](config/webpack.dev.config.js)
* `production` - [`config/webpack.prod.config.js`](config/webpack.prod.config.js)
  * Note that if you prefer to build and deploy [`sourcemap`](https://webpack.js.org/configuration/devtool/#production) files, you should configure your server to disallow access to the Source Map file for normal users!

# Development

## Assets Source

* **SASS/PostCSS** files are located under `src/scss/`
* **JavaScript** files with support of latest ECMAScript _ES6 / ECMAScript 2016(ES7)/ etc_ files are located under `src/js/`
* **Image** files are located under `src/img/`
* **Font** files are located under `src/fonts/`

## Built Assets

* _CSS_ files are located under `/assets/css/`
* _JavaScript_ files with support of _ES6 / ECMAScript 2016(ES7)_ files are located under `/assets/js/`
* _Images_ are located under `/assets/img/`
* _Fonts_ are located under `/assets/fonts/`

## Available CLI commands

`Radya` comes packed with CLI commands tailored for WordPress theme development :

- `npm run watch` : Build assets and enable source files watcher.
- `npm run dev` : Build assets for development.
- `npm run prod` : Build and optimize assets for production.
- `npm run bundle` : Generates a .zip archive for distribution, excluding development and system files.
- `npm run lint:sass` : Checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : Checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run stats` : This will open the visualisaion on the default configuraiton URL `localhost:8888`, you can change this URL or port following the [package](https://github.com/webpack-contrib/webpack-bundle-analyzer#options-for-cli) documentation.



> **Note:** File watching does not work with *NFS* (*Windows*) and virtual machines under *VirtualBox*. Extend the configuration in such cases by:

```js
module.exports = {
  //...
  watchOptions: {
    poll: 1000 // Check for changes every second
  }
};
```

Now you're ready to go! The next step is to make an awesome WordPress theme. :)

Good luck!