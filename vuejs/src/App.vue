<template>
<div id="app">
  <v-app id="inspire">
    <v-cards
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

            <v-btn icon class="mr-4" @click="myPage">
              <v-icon>mdi-account-circle</v-icon>MY
            </v-btn>

            <v-btn icon class="mr-7" @click="chat">
              <v-icon>mdi-message-text</v-icon>채팅
            </v-btn>

            <v-btn icon class="mr-5" @click="sale">
              <v-icon>mdi-cart-variant</v-icon>판매하기
            </v-btn>


       <template v-slot:extension>
          
          <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          
        </template> 
      </v-toolbar>
      
    </v-cards>
    <v-navigation-drawer
        v-model="drawer"
        absolute
        temporary
      >
        <v-list dense>
          <v-list-item
            v-for="item in categorys"
            :key="item.title"
            link
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
        { title: 'Home', icon: 'mdi-view-dashboard' },
        { title: 'About', icon: 'mdi-forum' },
        { title: 'Home', icon: 'mdi-view-dashboard' },
        { title: 'About', icon: 'mdi-forum' },
        { title: 'Home', icon: 'mdi-view-dashboard' },
        { title: 'About', icon: 'mdi-forum' },
        { title: 'Home', icon: 'mdi-view-dashboard' },
        { title: 'About', icon: 'mdi-forum' },
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
      this.$router.push('login');
    },
    write(){
      this.$router.push('write');
    },
    myPage(){
      this.$router.push('MyPage');
    },
    chat(){
      this.$router.push('Chat');
    },
    sale(){
      this.$router.push('Sale');
    }
    
   }
};
</script>

