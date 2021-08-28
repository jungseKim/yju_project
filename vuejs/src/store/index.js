import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
// import createPersistedState from "vuex-persistedstate";
// import modules from "./modules";

Vue.use(Vuex);

// const store = new Vuex.Store({
//   modules,
//   plugins: [
//     createPersistedState({
//       paths:['moduleName'],
//     })
//   ],
// });

export default new Vuex.Store({
  state: {
    user: null,

    searchPost:null,

     

    
      
  },

  mutations: {
    setUserData(state, userData) {
      state.user = userData;
      localStorage.setItem("user", JSON.stringify(userData));
      axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`;
      localStorage.setItem("address", userData.user.address);
    },

    clearUserData(state) {
      state.user = null;
      localStorage.removeItem("user");
      location.reload();
    },

    AddressUpdate(state, res) {
      console.log("data");
      console.log(res);
      // state.user.user.address = res.data;
      state.user.user.address = res.data;
      localStorage.setItem("address", res.data.address);
      console.log("동영");
      console.log(state.users);
    },
    searchUpdate(state,payload){
      state.searchPost=payload;
      console.log('asdasd');
      console.log(state.searchPost);
      console.log('ehddud');
    },
  },

  actions: {
    async login({ commit }, credentials) {
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
        const response = await axios.get(
          "http://localhost:8000/sanctum/csrf-cookie"
        );
        console.log(response.status);
        const { data } = await axios.post("/login", credentials);
        commit("setUserData", data);
      } catch (err) {
        console.log("asdsadsad");
        console.error(err);
      }
    },

    logout({ commit }) {
      axios.post("logout").then((response) => {
        console.log(response.data);
      });
      commit("clearUserData");
    },
    productAdd(payload) {
      axios
        .post("/productAdd", {
          content: payload.content,
          productName: payload.productName,
          saleAddress: payload.saleAddress,
          price: payload.price,
          newProduct: payload.newProduct,
          exchange: payload.exchange,
          delivery: payload.delivery,
        })
        .then(() => {
          alert("판매등록성공");
        })
        .catch(() => {});
    },
   
    addressUpdate({ commit }, payload) {
      axios.defaults.withCredentials = true;
      axios
        .patch("/addressUpdate", {
          address: payload.address,
          userId: payload.userId,
        })
        .then((res) => {
          console.log("성공");
          commit("AddressUpdate", res);
          console.log(res);
          // window.location.href = "http://localhost:8080/MyPage";
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {});
    },

    addProduct() {
      axios
        .post("/addProduct")
       
        .then(() => {
          alert("판매등록성공");
        })
        .catch(() => {});
    },
   

  },

  getters: {
    isLogged: (state) => !!state.user,
  },
});
