const path      = require('path');
const webpack   = require('webpack');

module.exports = {
    entry: [
        //"./public/packages/material-design-lite/material.js",
        //"./public/packages/mdl-select-component/mdl-selectfield.min.js",
        "./resources/assets/js/app.js",
    ],
    output: {
        path: path.resolve(__dirname, './public/assets/js'),
        //publicPath: '/dist/',
        filename: "build.js"
    },
    module: {
        loaders: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    // vue-loader options
                }
            },{
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /(node_modules|bower_components)/,
                options: {
                    presets: [['es2015',{modules: false}], 'env'],
                    plugins: ['syntax-dynamic-import']
                }
            }
        ]
    },
    resolve: {
        alias: {vue: 'vue/dist/vue.js'}
    },
    plugins: [
    /*
        // short-circuits all Vue.js warning code
        new webpack.DefinePlugin({
          'process.env': {
            NODE_ENV: '"production"'
          }
        }),
        // minify with dead-code elimination
        new webpack.optimize.UglifyJsPlugin({
          compress: {
            warnings: false
          }
        }),
    */
    ]
}
