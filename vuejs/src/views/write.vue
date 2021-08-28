<template>
<v-container>
       <v-text-field
              v-model="title"
              class="mt-12"
              color="purple darken-2"
              label="title"
              required
            ></v-text-field>
        <v-textarea
              class="mb-10"
              color="teal"
              v-model="content"
            >
              <template v-slot:label>
                <div>
                  Content <small>(optional)</small>
                </div>
              </template>
            </v-textarea>
              <v-file-input
              type="file"
              accept="image/*"
              label="File input"
              @change="selectFile"
              ></v-file-input>
             <v-layout align-center>
              <v-btn class="center" @click="post">submit</v-btn>
             </v-layout>
</v-container>
</template>

<script>
import axios from 'axios'
export default {
       data(){
              return{
                     title:'',
                     content:'',
                     file:null
              }
       },
       methods:{
              post(){
                     //라라벨로 포스트 이미지 보낼 때에는 무조건 폼대이터 형식 보내야 한다
                     const formData = new FormData();
                     formData.append("title",this.title);
                     formData.append("content",this.content);
                     formData.append("user_id",this.$store.state.user.user.id);
                    if(this.file){
                            formData.append("file",this.file);
                    }
                     axios.post('/posts',formData,{   
                             headers: {
                             'Content-Type': 'multipart/form-data'
                                    }
                               }
                             ).then(response=>{
                                    console.log(response);
                                    this.$router.push('/');
                     }).catch(err=>{
                            console.log(err.response.data)
                            if(err.response.data.errors.title){
                                   alert('제목은 필수입니다.')
                            }
                            if(err.response.data.errors.content){
                                   alert('내용은 필수입니다.')
                            }
                            if(err.response.data.errors.file){
                                   alert('사진만 업로드 가능합니다.')
                            }
                     })
                     
              },
              selectFile(file){
                     // v-file-input은 자동으로 매개변수로 옴
                     // this.file=this.$refs.file.files[0];
                     this.file=file;
                     // console.log(file);
              },
              // selectFile2(e){
              //        //그냥 input태그는  이렇게 해줘야됨
              //        console.log(e.target.files[0]);
              // },

       },
       mounted(){
              console.log(this.$store.state.user)
              console.log(this.$store.state.user.token)
       }
}
</script>