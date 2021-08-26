<template>
      <v-container>
              <h1>room</h1>
       <v-row>
       <ChatArea
       :messages="messages"
       />
       </v-row>
       <v-row>
              <input type="text" v-model="text"/>
              <v-btn @click="submit">확인</v-btn>
       </v-row>
      </v-container>
</template>

<script>
import axios from 'axios'
import ChatArea from './ChatArea';
import Pusher from 'pusher-js';
export default {
//         beforeRouteEnter (to,from,next){
//     next(vm => {
//            console.log(from)
//            console.log(vm.this.itemID)
           
//     })
//   },
       components: {
            ChatArea
        },
       data(){
              return{
                     itemID:'',
                     roomid:'',
                     messages:[],
                     text:''

             }
       },
       methods:{
              submit(){
                     axios.post('chatPost',{
                            text:this.text,
                            roomid:this.roomid
                     }).then(response=>{
                            console.log(response.data);
                            this.messages.push(response.data);
                            this.text='';
                     })
              }
       }
       ,
       mounted() {

              //라우터 어디서 왔는지 설정 정해주고 
              //async await로 바꾸기
              let url='';
               console.log(this.$route.params.roomid);
              if(this.$route.params.from=='item'){
                     console.log('aaa'+this.$route.params.itemId)
                     this.itemID=this.$route.params.itemId;
                     url='/ChatRoom/'+this.itemID;
              }
              else{
                     this.roomid=this.$route.params.roomid;
                     url='/room/'+this.roomid;
              }
            
             
                axios.get(url)
                     .then(response=>{
                            console.log(response.data);
                     if(response.status===203){
                     console.log(response.data.messages);
                            this.messages=response.data.messages;                    
                     }
                            this.roomid=response.data.roomid;

                     Pusher.logToConsole = true;
                   const pusher = new Pusher('09b388928591241646f6', {
                               cluster: 'ap3',
                               });
                         const channel = pusher.subscribe('chat'+this.roomid);
                         channel.bind('App\\Events\\MessageSent', e=>{
                                if(e.message.writer.id!=this.$store.state.user.user.id)
                            this.messages.push(e.message);
                            console.log(e.message.writer)
                            console.log(this.$store.state.user.user.id)
                       });


                     })
                     .catch(err => {
                            console.log(err.data)
                     })
            
    },
}
</script>