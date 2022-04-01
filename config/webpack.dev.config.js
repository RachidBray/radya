/* eslint-disable import/no-extraneous-dependencies */
const { merge } = require('webpack-merge');
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const webpackConfiguration = require('./webpack.config');
const environment = require('./environment');

module.exports = merge(webpackConfiguration, {
  mode: 'development',

  /* Manage source maps generation process */
  devtool: 'source-map',

  /* File watcher options */
  watchOptions: {
    aggregateTimeout: 300,
    poll: 300,
    ignored: /node_modules/,
  },

  /* Additional plugins configuration */
  plugins: [
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3100,
      ...environment.server,
    }),
    new WebpackRTLPlugin({
      diffOnly: true,
      minify: false,
    }),
  ],
});
