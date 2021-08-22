<template>
    <v-container>
        <v-row no-gutters>
            <v-col cols="2">
                <v-img class="profileImg" max-height="150" max-width="150"
                src="https://picsum.photos/id/11/500/300"
                ></v-img>
            </v-col>
            <v-col cols="4">
                <h1>{{ users[0].name }}</h1>
                <h1>{{ users[0].email }}</h1>
                <v-btn>follow</v-btn>
                <p>6 followers   8 following</p>
            </v-col>
            <v-col cols="4">
                <h2>주소 : {{ users[0].address }}</h2>
                <v-btn @click="showApi">수정</v-btn>
            </v-col>
           </v-row>  

            <br v-for="count in 2" :key="count">

            <v-card>
                <v-toolbar
                color="gray"
                dark
                flat
                >
                <template v-slot:extension>
                    <v-tabs
                    v-model="tabs"
                    centered
                    >
                    <v-tab
                        v-for="n in titles"
                        :key="n"
                    >
                        <h1>{{ n }}</h1>
                    </v-tab>
                    </v-tabs>
                </template>
                </v-toolbar>

                <v-tabs-items v-model="tabs">
                <v-tab-item>
                    <v-card flat>
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
                    </v-card>
                </v-tab-item>
                    
                <v-tab-item>
                    <v-card>
                        <v-row>
                            <v-col>내가 본 상품</v-col>
                        </v-row>
                    </v-card>
                </v-tab-item>

                <v-tab-item>
                    <v-card>
                        <v-row>
                            <v-col>찜한 상품</v-col>
                        </v-row>
                    </v-card>    
                </v-tab-item>
            </v-tabs-items>
         </v-card>
    </v-container>
</template>

<script>
import axios from 'axios'

  export default {
    data () {
      return {
        tabs: null,
        titles: [
            '판매중인 상품',
            '내가 본 내역',
            '찜'
        ],
        users:[],
        address:'',
        addressNum:'',
      }
    },
    mounted(){
        axios.post('/profile',{
            userId:this.$store.state.user.user.id, //???
        })
        .then(response=>{
            // alert('성공')
            console.log(response.data)
            this.users=response.data
            console.log(this.users);
        })
        .catch(err => {
            // alert('에러')
            console.log(err)
        })

        axios.patch('/addressUpdate', {
            userId:this.$store.state.user.user.id,
        })
        .then(response=>{
            console.log('성공');
        })
        .catch(err => {
            console.log(err)
        })
    },
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
    },
  }
</script>



<style>
    .profileImg{
        width: 300px;
        height: 300px;
        border-radius: 70%;
        overflow: hidden;
    }
</style>



