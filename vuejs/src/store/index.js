import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    user: 

    null
      
  },

  mutations: {
    setUserData (state, userData) {
      state.user = userData
      localStorage.setItem('user', JSON.stringify(userData))
      axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
    },

    clearUserData(state) {
      state.user = null;
      localStorage.removeItem('user')
      location.reload()
    }
  },

  actions: {
    async login ({ commit }, credentials) {
      // axios.get('/sanctum/csrf-cookie')
      //   .then(response => {
      //     axios.defaults.baseURL = 'http://localhost:8000/api'
      //     console.log('Hi~:' + response)
      //    return axios
      //   .post('/login', credentials)
      //   .then(({ data }) => {
      //     commit('setUserData', data)
      //   })
      //   }).catch(err => {
      //     console.log(err);
      // })
      try {
        const response = await axios.get('http://localhost:8000/sanctum/csrf-cookie')
      console.log(response.status);
      
     const {data}= await axios.post('/login', credentials)
      commit('setUserData', data);
      } catch (err) {
        console.log('asdsadsad')
        console.error(err);
      }
    },

    logout({ commit }) {
      axios.post('logout').then(response => {
         console.log(response.data)
       })
      commit('clearUserData')
    },
    addProduct(){
            
      axios.post('/addProduct')
      //      content: payload.content,
      //  productName:payload.productName,
      //  saleAddress:payload.saleAddress,
      //  price:payload.price,
      //  newProduct:payload.newProduct,
      //  exchange:payload.exchange,
      //  delivery:payload.delivery,
      //  })
       .then(()=>{
           alert('판매등록성공');
       })
       .catch(()=>{

       })
   }
  },

  getters : {
    isLogged: state => !!state.user
  }
})
