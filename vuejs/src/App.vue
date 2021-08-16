<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
          transition="scale-transition"
          width="40"
        />

        <v-img
          alt="Vuetify Name"
          class="shrink mt-1 hidden-sm-and-down"
          contain
          min-width="100"
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-name-dark.png"
          width="100"
        />
      </div>

      <v-spacer></v-spacer>

      <v-btn v-if="$store.state.user" @click="write" 
      class="mr-4">write
          <v-icon>fa-edit</v-icon>
        </v-btn>
  
      <v-btn v-if="$store.state.user==null" @click="login">login
          <v-icon>mdi-open-in-new</v-icon>
        </v-btn>

        <v-btn v-else @click="logout">logOut
          <v-icon>mdi-open-in-new</v-icon>
        </v-btn>
        
      
    </v-app-bar>

    <v-main>
      <router-view/>
    </v-main>
  </v-app>
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
