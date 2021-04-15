const path = require('path');
const { VueLoaderPlugin } = require('vue-loader')

module.exports = {
    entry: [
        './resources/js/main.js',
        './resources/scss/main.scss'
    ],
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'dist/js'),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [],
            }, {
                test: /\.scss$/,
                exclude: /node_modules/,
                use: [
                    {
                        loader: 'file-loader',
                        options: { 
                            outputPath: '../css/', 
                            name: 'app.css'
                        }
                    },
                    'sass-loader'
                ]
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ]
    },
    plugins: [
        // make sure to include the plugin!
        new VueLoaderPlugin()
    ]
};