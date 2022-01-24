/**
 * Webpack main configuration file
 */

const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const {
  CleanWebpackPlugin
} = require('clean-webpack-plugin');
const WebpackRTLPlugin = require('webpack-rtl-plugin');

const environment = require('./environment');

module.exports = {

  entry: {
    main: path.resolve(environment.paths.source, 'js', 'main.js'),
    editor: path.resolve(environment.paths.source, 'scss', 'editor.scss'),
  },
  output: {
    filename: 'js/[name].js',
    path: environment.paths.output,
  },
  module: {
    rules: [{
      test: /\.((c|sa|sc)ss)$/i,
      use: [
        {
          loader: MiniCssExtractPlugin.loader,
        },
        {
          loader: 'css-loader',
          options: {},
        },
        {
          loader: 'postcss-loader',
          options: {},
        },
        {
          loader: 'sass-loader',
          options: {},
        },
      ],

    },
    {
      test: /\.js$/,
      exclude: /node_modules/,
      use: ['babel-loader'],
    },
    {
      test: /\.(png|gif|jpe?g|svg)$/i,
      type: 'asset',
      parser: {
        dataUrlCondition: {
          maxSize: environment.limits.img,
        },
      },
      generator: {
        filename: 'img/[name].[hash:6][ext]',
      },
    },
    {
      test: /\.(eot|ttf|woff|woff2)$/,
      type: 'asset',
      parser: {
        dataUrlCondition: {
          maxSize: environment.limits.img,
        },
      },
      generator: {
        filename: 'fonts/[name].[hash:6][ext]',
      },
    },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].css',
    }),
    new ImageMinimizerPlugin({
      test: /\.(jpe?g|png|gif|svg)$/i,
      minimizerOptions: {
        // Lossless optimization with custom option
        // Feel free to experiment with options for better result for you
        plugins: [
          ['gifsicle', {
            interlaced: true
          }],
          ['jpegtran', {
            progressive: true
          }],
          ['optipng', {
            optimizationLevel: 5
          }],
          [
            'svgo',
            {
              plugins: [{
                name: 'removeViewBox',
                active: false,
              }, ],
            },
          ],
        ],
      },
    }),
    new CleanWebpackPlugin({
      verbose: true,
      cleanOnceBeforeBuildPatterns: ['**/*', '!stats.json'],
    }),
    new CopyWebpackPlugin({
      patterns: [{
        from: path.resolve(environment.paths.source, 'img'),
        to: path.resolve(environment.paths.output, 'img'),
        toType: 'dir',
        globOptions: {
          ignore: ['*.DS_Store', 'Thumbs.db'],
        },
      }, ],
    }),
    new WebpackRTLPlugin({
      filename: 'css/rtl.css',
      options: {},
      plugins: [],
      diffOnly: true,
      minify: true,
    }),
  ],
};
