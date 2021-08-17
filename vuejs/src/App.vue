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
  
        <v-toolbar-title>Logo</v-toolbar-title>

        <v-spacer></v-spacer>
        <v-text-field />
        <v-spacer></v-spacer>

            <v-btn icon>
              <v-icon>mdi-account-circle</v-icon>MY
            </v-btn>

            <v-btn icon>
              <v-icon>mdi-message-text</v-icon>채팅
            </v-btn>

            <v-btn icon>
              <v-icon>mdi-cart-variant</v-icon>판매하기
            </v-btn>


       <template v-slot:extension>
          <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </template> 
      </v-toolbar>
      
    </v-cards>
    <v-main>
      <router-view/>
    </v-main>
    
  </v-app>
</div>
</template>
    
<script>

export default {
  name: 'App',

  data: () => ({
    //
  }),
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
    }
   }
};
</script>

<style scoped>

</style>
