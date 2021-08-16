<template>
  <v-form class="display-1 my-10" ref="form" v-model="valid">
    <v-container class="container">
    <!-- <v-row>
      <v-col cols="12" sm="6" > -->
        <h1 class="title">로그인</h1><br>
        <v-text-field 
              v-model="email"
              label="email"
              required
              outlined
        ></v-text-field>

        <v-text-field
              v-model="password"
              label="password"
              required
              outlined
        ></v-text-field>

          <v-btn block
            :disabled="!valid"
              color="success"
              class="mr-4"
              @click="login"
          >로그인
          </v-btn><br>

          <v-btn block
            color="primary"
            class="mr-4"
            @click="register"
          >회원가입
          </v-btn>

        
      <!-- </v-col>
    </v-row> -->
  </v-container>
  </v-form>
</template>

<script>
export default {
  data () {
    return {
      valid:true,
      email: '',
      password: ''
    }
  },

  methods: {
    login () {
      this.$store
        .dispatch('login', {
          email: this.email,
          password: this.password
        })
        .then(() => {
          this.$router.push({ name: 'map' })
        })
        .catch(err => {
          console.log(err.message)
          alert('아이디와 비밀번호를 확인해 주세요')
        })
    },
    register(){
      if(this.$store.state.user){
        return alert('로그 아웃후 이용해 주세요');
      }
      else{
        this.$router.push('register')
      }
    }
  }
}
</script>

<style>
  .class{
    text-align: center;
  }
  .container{
    max-width: 500px;
  }
</style>