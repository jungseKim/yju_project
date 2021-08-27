<template>
    <div>
        MyPage
        <v-btn @click="deleteAccount">회원탈퇴</v-btn>
        <div>{{text}}</div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            text : null
        }
    },
    methods:{
        deleteAccount(){
            axios.post('/deleteAccount').then(res=>{
                // this.text=res.data.id;
                     this.$store.dispatch('logout')
                    const home = window.location.origin;
                    this.text=res.data;
                    alert(this.text);
                    // location.href=`${home}/api/logout`;
                    location.href=home;
                }
            )
            // axios.post('/get').then(res=>{
                //     console.log(res);
            //     this.text=res.data;
            //     }
            // )
        },
    }
}
</script>



<style>
.profileImg {
  width: 150px;
  height: 150px;
  border-radius: 70%;
  overflow: hidden;
}
</style>