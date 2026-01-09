const path = require('path');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

/**
 * Auto-generate entries from widgets folder
 */
function getWidgetEntries() {
  const entries = {};
  const jsDir = path.resolve(__dirname, 'src/js/widgets');
  const scssDir = path.resolve(__dirname, 'src/scss/widgets');

  fs.readdirSync(jsDir).forEach(file => {
    if (file.endsWith('.js')) {
      const name = file.replace('.js', '');

      const jsFile = path.join(jsDir, file);
      const scssFile = path.join(scssDir, `${name}.scss`);

      entries[name] = [jsFile];

      // Attach SCSS only if it exists
      if (fs.existsSync(scssFile)) {
        entries[name].push(scssFile);
      }
    }
  });

  return entries;
}

module.exports = {
  mode: 'production',

  entry: getWidgetEntries(),

  output: {
    path: path.resolve(__dirname, 'build/assets/js'),
    filename: '[name].js',
    clean: true
  },

  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      }
    ]
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/[name].css'
    })
  ]
};

