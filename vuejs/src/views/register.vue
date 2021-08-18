<template>
  <v-form mt-10 ref="form" v-model="valid">
    <v-container>
    <h1 class="title">회원가입</h1><br>
    <span>이름</span>
    <v-text-field
      v-model="name"
      :counter="10"
      :rules="nameRules"
      label="Name"
      required
      outlined
    ></v-text-field>

    이메일
    <v-text-field
      v-model="email"
      :rules="emailRules"
      label="E-mail 입력"
      required
      outlined
    ></v-text-field>

   비밀번호
   <v-text-field
   type="password"
      v-model="password"
       :rules="passwordRules"
      label="password 입력"
      required
      outlined
    ></v-text-field>

    비밀번호 확인
       <v-text-field
        type="password"
      v-model="password2"
     
      label="password 확인"
      required
      outlined
    ></v-text-field>
  

    <v-btn block
      :disabled="!valid"
      color="success"
      class="mr-4"
      @click="validate"
    >
     go register
    </v-btn>

    </v-container>
  </v-form>
</template>

<script>
import axios from 'axios'
  export default {
    data: () => ({
      valid: true,
      name: '',
       password:'',
      password2:'',
      password_confirmation:true,
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      passwordRules: [
        v => !!v || 'password is required',
        v => v.length>3 || '너무 짧다',
      ],
    
    }),

    methods: {
      validate () {
       if(this.password!=this.password2){
              return alert('password not matched')
       }else{
              this.password_confirmation=true;
       }

       axios.post('/register',{
              email:this.email,
              name:this.name,
              password:this.password,
              password_confirmation:this.password_confirmation
       }).then(response=>{
              console.log(response.status)
              this.$router.push('/login');
       }).catch(err=>{
               console.log(err.response.data);
               alert('사용불가능한 이메일 입니다')
               this.email='';
               
       })
      },
      reset () {
        this.$refs.form.reset()
      }
    },
  }
</script>

<style scoped>
.title{
  text-align: center;
}
.container{
    max-width: 500px;
  }
</style>