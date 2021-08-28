module.exports = {
  transpileDependencies: [
    'vuetify'
  ],

  devServer: {
    overlay:false,
    proxy: {
      '/api': {
        target: 'http://localhost:8000',
        changeOrigin: true,
        pathRewrite: {
          '^/api':''
        }
      }
    }
  }
}
