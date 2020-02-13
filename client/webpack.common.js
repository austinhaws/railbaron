const path = require('path');
const fs = require('fs');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const SriPlugin = require('webpack-subresource-integrity');

// where does source live
const APP_DIR = path.resolve(__dirname, 'src/js');
const DTS_REACT_COMMON_NODE_MODULES = fs.realpathSync(__dirname + '/node_modules/dts-react-common');

// where does compiled code go
const BUILD_DIR = path.resolve(__dirname, 'dist');

const htmlWebPack = new HtmlWebpackPlugin({
	template: 'src/index.html'
});

//copy static resources to the build directory
const copyStatic = new CopyWebpackPlugin(
	[{
		from: 'src/static/',
		to: ''
	}]
);

//clean up the BUILD_DIR before code is generated
const cleanWebPack = new CleanWebpackPlugin({
	verbose: true,
	cleanStaleWebpackAssets: false,
});

// tell it what file to starting compiling on and what to call it when done
const config = {
	entry: {
		examples: APP_DIR + '/components/app/App.jsx',
	},
	output: {
		path: BUILD_DIR,
		filename: '[name].[contenthash].bundle.js',
		crossOriginLoading: 'anonymous',
	},
	optimization: {
		runtimeChunk: 'single',
		splitChunks: {
			cacheGroups: {
				vendor: {
					test: /[\\/]node_modules[\\/]/,
					name: 'vendors',
					chunks: 'all'
				}
			}
		}
	},
	module : {
		rules : [
			// use babel loader
			{
				test : /\.jsx?$/,
				include : APP_DIR,
				loader : 'babel-loader',
				options: {
					configFile: './babel.config.js'
				}
			},
			{
				test : /\.jsx?$/,
				include : DTS_REACT_COMMON_NODE_MODULES,
				loader : 'babel-loader',
				options: {
					configFile: './babel.config.js'
				}
			},
			{
				test: /\.(png|jpg|gif|svg)$/,
				use: [
					{
						loader: 'url-loader',
						options: {
							limit: 10000,
							fallback: 'file-loader',
							name: '[name].[ext]',
							outputPath: 'img/',
							emitFile: false,
						}
					}
				]
			},
			{
				test: /\.md$/,
				use: [
					{
						loader: 'raw-loader'
					}
				]
			}
		]
	},
	plugins: [
		cleanWebPack,
		copyStatic,
		htmlWebPack,
		new SriPlugin({
			hashFuncNames: ['sha256', 'sha384'],
			enabled: true,
		}),
	],
	resolve: {
		extensions: ['.js', '.jsx', '.json'],
		//fix a bug in react-select that was finding two instances of react in each node_modules
		alias: { 'react': path.resolve(__dirname, 'node_modules', 'react') }
	},
};

module.exports = config;
