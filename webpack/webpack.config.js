const path = require('path');

module.exports = {
  entry: {
	import: './src/index.js',
	import: '../node_modules/swiper/modules/navigation.css',
	import: '../node_modules/swiper/modules/pagination.css',
	import: '../node_modules/swiper/swiper.css',
  },
  output: {
    filename: 'new.js',
    path: path.resolve(__dirname, 'dist'),
  },
};