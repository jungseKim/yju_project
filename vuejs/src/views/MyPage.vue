<template>

    <v-container fluid>
        <v-btn @click="deleteAccount">회원탈퇴</v-btn>
        <div>{{text}}</div>
        <v-row no-gutters>
            <v-col col-4>
                <v-img class="profileImg" max-height="150" max-width="150"
                src="https://picsum.photos/id/11/500/300"
                ></v-img>
            </v-col>
            <v-col col-2>
                <h1>이유비ds</h1>
                <h2>orbi98@naver.com</h2>
                <v-btn>follow</v-btn>
                <p>6 followers   8 following</p>
                <p>우편번호 : 785611</p>
                <p>경상북도 포항시 북구</p>
            </v-col>
            <v-col v-for="count in 4" :key="count" col-6></v-col>
        </v-row>
        <br>
        <h1>판매중인 상품</h1>
        <br v-for="count in 3" :key="count">
        <v-row>
                            <v-col v-for="count in 20" :key="count" cols="3">
                                <v-card>
                                    <v-img src="https://picsum.photos/id/11/500/300"></v-img>
                                    <p>상품명 : 먹다남은 치즈</p>
                                    <p>가격 : 5000원</p>
                                    <p>판매날짜 : 2019/7/29</p>
                                </v-card>
                            </v-col>
                        </v-row> 
    </v-container>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            text : null,
            tabs : null
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