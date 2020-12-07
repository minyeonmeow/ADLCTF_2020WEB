const webpack = require('webpack');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const UglifyJsPlugin=require('uglifyjs-webpack-plugin');
const path = require('path');
const env = process.env.NODE_ENV;

module.exports = {
    entry: path.join(__dirname, "src", "index.js"),
    mode: env,
    output: {
	path: path.resolve(path.join(__dirname, '../src/js')),
	filename: "app.js"
    },
    module: {
	rules: [
	    {
		test: /\.vue$/,
		loader: 'vue-loader',
	    },
	    {
		test: /\.js$/,
		loader: 'babel-loader',
		include: [path.join(__dirname, 'src'), path.join(__dirname, 'dist')]
	    },
	    {
		test: /\.css$/,
		use: [
		    'vue-style-loader',
		    'css-loader'
		]
	    }
	]
    },
    resolve: {
	extensions: ['.js', '.vue'],
	alias: {
	    'vue':'vue/dist/vue.esm.js',//指定 vue 對應使用的真實 js 檔案
	}
    },
    plugins:[
	new VueLoaderPlugin()
    ],
    performance: {
	hints: false
    },
    devtool: '#eval-source-map'
};
if (process.env.NODE_ENV === 'production') {
    module.exports.devtool = '#source-map'
    // http://vue-loader.vuejs.org/en/workflow/production.html
    module.exports.plugins = (module.exports.plugins || []).concat([
	new webpack.DefinePlugin({
	    'process.env': {
		NODE_ENV: '"production"'
	    }
	}),
	new webpack.LoaderOptionsPlugin({
	    minimize: true
	})
    ]);
    module.exports.optimization = {
	minimizer: [
	    new UglifyJsPlugin({
		uglifyOptions: {
		    compress: false
		},
		minify(file, sourceMap) {
		    const extractedComments = [];

		    // Custom logic for extract comments

		    const { error, map, code, warnings } = require('uglify-js') // Or require('./path/to/uglify-module')
			.minify(file, {
			    /* Your options for minification */
			});

		    return { error, map, code, warnings, extractedComments };
		},
	    })
	]
    };
}
