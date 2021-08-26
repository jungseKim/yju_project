<template>
       <v-container>
              <v-row v-for="item in listToSell" :key="item.id">
                   <v-col v-for="chat in item.ars" :key="chat.id">
                          <p @click="goChat(chat.id)">{{chat.user_id}}</p>
       
                     </v-col>
              </v-row>
              <v-spacer/>
               <v-row v-for="item in listToBuy" :key="item.id">
                  <p @click="goChat2(item.id)">{{item.id}}</p>
              </v-row>

       </v-container>
</template>

<script>
import axios from 'axios'
export default {
       data(){
              return{
                     listToBuy:[],
                     listToSell:[]
              }
       },
       methods:{
              //내가 사기 할때에 라우터 파라미터
              goChat(arr){
                this.$router.push({name: 'ChatRoom', params: {roomid:arr}})
                
              },
              goChat2(arr){
              this.$router.push({name: 'ChatRoom', params: {itemId:arr,from:'item'}})
                
              }
       },
       mounted(){
              axios.get('chatList')
              .then(response=>{
                      console.log(response.data);
                     this.listToBuy=response.data.toBuy;
                      this.listToSell=response.data.toSell;//배열 안에 객체안에 배열
                       

              }).catch(err=>{
                     console.log(err.data);
              })
       }
}
</script>