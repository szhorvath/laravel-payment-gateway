const path = require('path')
const mix = require('laravel-mix')

// const options = mix.options({})
// const hmr = options.config.hmr
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')
mix
  .js('resources/js/app.js', 'public/js/')
  .sass('resources/sass/app.scss', 'public/css')

  .sourceMaps()
  .disableNotifications()

if (mix.inProduction()) {
  mix.version()

  mix.extract([
    'vue',
    'vform',
    'axios',
    'vuex',
    'vue-meta',
    'vue-router',
    'vue-scrollto',
    'bootstrap-vue',
    'vuex-router-sync',
    '@fortawesome/fontawesome-svg-core',
    '@fortawesome/vue-fontawesome'
  ])
}

mix.webpackConfig({
  // docker specific settings for hmr
  watchOptions: {
    poll: 2000,
    ignored: / node_modules /
  },
  plugins: [
    // new BundleAnalyzerPlugin()
  ],
  resolve: {
    extensions: ['.js', '.json', '.vue'],
    alias: {
      '~': path.join(__dirname, './resources/js'),
      '@': path.join(__dirname, './resources/sass')
    }
  },
  output: {
    // publicPath: hmr ? ('http' + '://localhost:8080') : '/',
    chunkFilename: 'js/[name].[chunkhash].js'
  }
})

// Workaround on windows to use hot module replacement
Mix.listen('configReady', webpackConfig => {
  if (Mix.isUsing('hmr')) {
    // Remove leading '/' from entry keys
    webpackConfig.entry = Object.keys(webpackConfig.entry).reduce((entries, entry) => {
      entries[entry.replace(/^\//, '')] = webpackConfig.entry[entry]
      return entries
    }, {})

    // Remove leading '/' from ExtractTextPlugin instances
    webpackConfig.plugins.forEach(plugin => {
      if (plugin.constructor.name === 'ExtractTextPlugin') {
        plugin.filename = plugin.filename.replace(/^\//, '')
      }
    })
  }
})

// mix.browserSync('portal.onecallinsurance.local')
