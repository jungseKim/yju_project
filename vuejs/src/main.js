import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import store from './store'

import axios from 'axios'

const cors = require('cors');
app.use(cors());

Vue.config.productionTip = false

axios.defaults.withCredentials=true
//쿠기 보내려면 이것 트로
axios.defaults.baseURL = 'http://localhost:8000/api'

new Vue({
  router,
  store,
  vuetify,
  created () {
    const userInfo = localStorage.getItem('user')
    if (userInfo) {
      const userData = JSON.parse(userInfo)
      this.$store.commit('setUserData', userData)
    }
    axios.interceptors.response.use(
      response => response,
      error => {
        if (error.response.status === 401) {
          this.$store.dispatch('logout')
        }
        return Promise.reject(error)
      }
    )
  },
  render: h => h(App)
}).$mount('#app')
