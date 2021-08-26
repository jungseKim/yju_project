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
                    this.text=res.data;
                    alert(this.text);
                }
            )
            // axios.post('/get').then(res=>{
            //     console.log(res);
            //     this.text=res.data;
            //     }
            // )
        }
    }
}
</script>
