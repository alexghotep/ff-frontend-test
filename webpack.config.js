const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const autoprefixer = require('autoprefixer');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const {minify} = require('terser-webpack-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const ProgressPlugin = require('progress-webpack-plugin')

const isDev = process.env.NODE_ENV === 'development';
const isProd = !isDev;

// default config if no config defined
// set local env in browsersync.config.js
let browsersyncsconfig = {
    proxy: 'http://localhost:80', /* local host:port */
    port: 3000 /* bs port */
};

try {
    browsersyncsconfig = require('./browsersync.config');
} catch (ex) {

}

module.exports = {
    context: path.resolve(__dirname, 'src'),
    mode: 'development',
    entry: {
        main: path.resolve(__dirname, './src/index.js'),
    },
    output: {
        path: path.resolve(__dirname, 'docs'),
        filename: `./js/scripts.js`,
        clean: true,
    },
    plugins: [
        new ProgressPlugin(),
        autoprefixer,
        new MiniCssExtractPlugin({
            filename: `./css/app.css`,
        }),
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: './layout/',
                    to: path.resolve(__dirname, 'docs'),
                }
            ]
        }),
        new BrowserSyncPlugin({
            proxy: browsersyncsconfig.proxy,
            port: browsersyncsconfig.port,
            files: [
                path.resolve(__dirname, 'docs')
            ],
            injectCss: true,
            notify: false,
        }, {
            reload: false,
        })
    ],
    devtool: isProd ? false : 'source-map',
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(s[ac]|c)ss$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader'],
            },
            {
                test: /\.(woff(2)?|ttf|eot)$/,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][ext]',
                },
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'images/[name][ext]',
                },
            },
        ],
    },
    optimization: {
        minimizer: [
            new TerserPlugin({minify, parallel: true, extractComments: false}),
            new CssMinimizerPlugin({
                minimizerOptions: {
                    preset: [
                        'default',
                        {
                            discardComments: {removeAll: true},
                        },
                    ],
                },
            }),
        ],
        minimize: !isDev,
    },
};
