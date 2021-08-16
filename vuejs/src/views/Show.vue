<template>
  <v-card
    class="mx-auto mt-12"
    max-width="400"
  >
    <v-img v-if="post.img"
      class="white--text align-end"
      height="200px"
     :src="'http://localhost:8000/storage/image/'+post.img"
    />
     <v-img v-else
      class="white--text align-end"
      height="200px"
    src='http://1ononeespresso.com.au/wp-content/uploads/2016/07/noimage.png'
    />
      <v-card-title>제목 : {{post.title}}</v-card-title>
   

    <v-card-subtitle class="pb-0">
     작성자: {{ post.user_id }}
    </v-card-subtitle>

    <v-card-text class="text--primary">
      <div>{{post.content}}</div>
    </v-card-text>
  </v-card>
</template>

<script>
import axios from 'axios'
  export default {
    name: 'ReadMemo',
    data(){
      return {
       post:{}
        
      }
    }
    ,
     mounted(){
        axios.get('/show/'+this.$route.params.postId,{
        }).then(response=>{
               this.post=response.data;
               console.log(response.data);
        })
      },
      methods:{
       
      }
  }
</script>