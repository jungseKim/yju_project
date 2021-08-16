<template>
       <v-container>
              <v-row>
                     <v-col>
                            <v-card>
                                   
                                   <v-img max-width="150px" contain :src="'http://localhost:8000/storage/image/어휘(N3)-5주 1일차_1628837436.jpg'" />
                                   <v-card-title>asdsfasdfs</v-card-title>
                                   <v-divider></v-divider>
                                   dsfsdf
                            </v-card>
                     </v-col>
                     <v-col>
                            dfdfdfdfdf
                     </v-col>
                     <v-col>
                            dfdfdfdfdf
                     </v-col>
              </v-row>
              <v-row>
                     <v-col>
                            dfdfdfdfdf
                     </v-col>
                     <v-col>
                            dfdfdfdfdf
                     </v-col>
                     <v-col>
                            dfdfdfdfdf
                     </v-col>
              </v-row>
       </v-container>
</template>

<script>
import axios from 'axios'
export default {
       data(){
              return{
                     items:[]
              }
       },
       methods:{
              serSerarch(e){
                     if(!e){
                            return 'noimage.jpg'
                     }else{return e}
              }
       },
       mounted(){
              axios.get('/post')
              .then(response=>{
                     console.log(response.data)
                     this.items=response.data
              })
       }
}
</script>