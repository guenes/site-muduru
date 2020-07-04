var path = require('path');

var config = {
  optimization: {
    minimize: false
  },
  externals: {
    jquery: 'jQuery'
    },
    module: {
      rules: [
        {
          loader: 'babel-loader',
          query: {
            presets: ['es2015']
          },
          test: /\.js$/,
          exclude: /node_modules/
        }
      ]
    },
};

var publicScripts = Object.assign({}, config, {
    entry: "./public/js/src/site-muduru-public.js",
    output: {
       path: path.resolve(__dirname, './public/js'),
       filename: "site-muduru-public.js"
    },
});
var adminScripts = Object.assign({}, config,{
    entry: "./admin/js/src/site-muduru-admin.js",
    output: {
       path: path.resolve(__dirname, './admin/js'),
       filename: "site-muduru-admin.js"
    },
});

module.exports = [
    publicScripts, adminScripts,
];
