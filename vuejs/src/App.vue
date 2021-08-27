<template>
<div id="app">
  <v-app id="inspire">
    <v-card
      flat
      height="200px"
      tile
    >
      <v-toolbar extended>
          
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
          transition="scale-transition"
          width="40"
        />
  
        <v-toolbar-title><router-link to="/" style=" text-decoration:none">Logo</router-link></v-toolbar-title>
        

        <v-spacer></v-spacer>
        <v-text-field />
        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
        <v-spacer></v-spacer>

            <v-btn icon class="mr-5" v-if="$store.state.user==null" @click="login">
              <v-icon>mdi-power</v-icon>login
            </v-btn>

            <v-btn icon class="mr-5" v-else @click="logout">
              <v-icon>mdi-power</v-icon>logout
            </v-btn>


       <template v-slot:extension>
          
          <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          <v-spacer></v-spacer>
          <v-btn icon class="mr-4" @click="myPage">
              <v-icon>mdi-account-circle</v-icon>MY
            </v-btn>

            <v-btn icon class="mr-7" @click="chat">
              <v-icon>mdi-message-text</v-icon>채팅
            </v-btn>

            <v-btn icon class="mr-5" @click="sale">
              <v-icon>mdi-cart-variant</v-icon>판매하기
            </v-btn>
        </template> 
      </v-toolbar>
      
    </v-card>
    <v-navigation-drawer
        v-model="drawer"
        absolute
        temporary
      >
      <h3 class="category">카테고리</h3>
      <v-divider></v-divider>

        <v-list dense>
          <v-list-item
            v-for="item in categorys"
            :key="item.title"
            link
            @click="categoryClick(item.title)"
          >
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
  
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
    <v-main>
      <router-view/>
    </v-main>
    
  </v-app>
</div>
</template>
    
<script>

export default {
  name: 'App',

  data () {
    return {
      drawer: null,
      categorys: [
        { title: '의류', icon: 'mdi-tshirt-crew' },
        { title: '신발', icon: 'mdi-shoe-sneaker' },
        { title: '가방', icon: 'mdi-briefcase' },
        { title: '시계', icon: 'mdi-watch' },
        { title: '액세서리', icon: 'mdi-sunglasses' },
        { title: '디지털/가전', icon: 'mdi-tablet-cellphone' },
        { title: '스포츠/레저', icon: 'mdi-view-dashboard' },
        { title: '차량/오토바이', icon: 'mdi-car-hatchback' },
        { title: '음반/악기', icon: 'mdi-music-circle' },
        { title: '도서/티켓/문구', icon: 'mdi-notebook' },
        { title: '뷰티/미용', icon: 'mdi-hair-dryer' },
        { title: '가구/인테리어', icon: 'mdi-sofa-single' },
        { title: '생활/가공식품', icon: 'mdi-food' },
        { title: '기타', icon: 'mdi-forum' },
        
      ],
    }
  },
  computed:{
      check(){
        if(!localStorage.getItem('user')){
          return true;
        }
        return false;
      }
  },
   methods: {
    logout () {
      this.$store.dispatch('logout')
    },
    login(){
      this.$router.push('/login');
    },
    write(){
      this.$router.push('/write');
    },
    myPage(){
      this.$router.push('/MyPage');
    },
    chat(){
      this.$router.push('/Chat');
    },
    sale(){
      this.$router.push('/Sale');
    },
    categoryClick(title){
      this.$router.push({name:'CategoryItems', query:{title:title}})
      this.$router.go(this.$router.currentRoute);
    }
    
   }
};
</script>

<style scoped>
.category{
  margin: 10px;
}
</style>

