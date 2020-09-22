const merge = require('webpack-merge');
const common = require('./webpack.common');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');


module.exports = merge(common, {
  mode: 'development',
  devtool: 'inline-source-map',
  plugins: [
    new CleanWebpackPlugin({
      cleanStaleWebpackAssets: false,
    }),
    new BrowserSyncPlugin({
      proxy: 'www.canberra.local',
      files: [
        '**/*.php'
      ],
      reloadDelay: 0,
      notify: false
    })
  ]
});