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

    <div class="daummap"> 
      <v-icon>mdi-home</v-icon> 
      <v-btn @click="showApi">주소찾기</v-btn><br><br>
      <p type="addressNum" label="우편번호" required outlined readonly>우편번호: {{ addressNum }}</p>
      <p label="주소" required>주소: {{ address }}</p> 
      <div ref="embed"></div> 
    </div>
    
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
    name:'daumMap',
    
    data : () => ({
      valid: true,
      name: '',
      password:'',
      password2:'',
      password_confirmation:true,
      address:'',


      addressNum:'',
      
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
      showApi() { new window.daum.Postcode({ oncomplete: (data) => { 
        let fullRoadAddr = data.roadAddress; 
        let extraRoadAddr = ''; 
        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){ extraRoadAddr += data.bname; } 
        if(data.buildingName !== '' && data.apartment === 'Y'){ extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName); } 
        if(extraRoadAddr !== ''){ extraRoadAddr = ' (' + extraRoadAddr + ')'; } 
        if(fullRoadAddr !== ''){ fullRoadAddr += extraRoadAddr; } 
        this.addressNum = data.zonecode; 
        this.address = fullRoadAddr; } }).open() 
        },

      validate () {
       if(this.password!=this.password2){
              return alert('password not matched')
       }else{
              this.password_confirmation=true;
       }
       console.log(this.address);
       axios.post('/register',{
              email:this.email,
              name:this.name,
              password:this.password,
              password_confirmation:this.password_confirmation,
              address:this.address
       }).then(response=>{
              console.log(response.status)
              this.$router.push('/login');
       }).catch(err=>{
               console.log(err);
              //  console.log(this.email);
              //  alert('사용불가능한 이메일 입니다')
              //  this.email='';
               
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