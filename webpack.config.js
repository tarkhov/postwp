import path from "node:path"
import { fileURLToPath } from "node:url"
import Dotenv from 'dotenv-webpack'
import MiniCssExtractPlugin from "mini-css-extract-plugin"

// In Node.js versions prior to native support for import.meta.dirname,
// derive __dirname from import.meta.url.
// (Node 20.11+ supports import.meta.dirname and import.meta.filename.)
const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

export default {
  mode: 'production',
  entry: {
    home: ['./src/js/home.js', './src/scss/home.scss'],
    page: ['./src/js/page.js', './src/scss/page.scss'],
    blog: './src/scss/blog.scss',
    post: ['./src/js/post.js', './src/scss/post.scss'],
    contacts: './src/scss/contacts.scss',
    shop: ['./src/js/shop.js', './src/scss/shop.scss'],
    product: ['./src/js/product.js', './src/scss/product.scss'],
  },
  output: {
    filename: 'js/[name].js',
    path: path.resolve(__dirname, "assets")
  },
  plugins: [
    new Dotenv(),
    new MiniCssExtractPlugin({ filename: 'css/[name].css' })
  ],
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader"]
      },
      {
        test: /\.scss$/i,
        type: "asset/resource",
        generator: {
          filename: "css/[name].css",
        },
        use: [
          "sass-loader"
        ]
      },
      {
        test: /\.js$/,
        include: path.resolve(__dirname, 'src'),
        use: {
          loader: 'babel-loader',
          options: {
            targets: "defaults",
            presets: [
              ['@babel/preset-env', { "modules": false }]
              // ['@babel/preset-env', { targets: "defaults" }]
            ]
          }
        }
      }
    ]
  },
  optimization: {
    splitChunks: {
      chunks: 'all',
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendors',
          chunks: 'all'
        }
      }
    }
  }
}