<template>
    <v-container>
        <v-container class="mb-5">
            <v-row>
                <v-img width="200" height="400" contain :src="imagePath+serSerarch(item.img)" />
                <v-col cols="8" class="pa-0">
                    <v-card height="100" class="mb-1" flat outlined>
                        <h1 align="center">{{ item.productName }}</h1>
                        <h2 align="right">{{ item.price }}원</h2>
                    </v-card>
                    <v-divider></v-divider>
                    <v-card height="200" class="mb-1" flat outlined>
                        <v-row>
                            <v-col cols="2"><v-card-text>상품상태</v-card-text></v-col>
                            <v-col><v-card-text>{{ item.newProduct }}</v-card-text></v-col>
                        </v-row>
                        <v-row class="mt-0">
                            <v-col cols="2"><v-card-text>교환여부</v-card-text></v-col>
                            <v-col><v-card-text>{{ item.exchange }}</v-card-text></v-col>
                        </v-row>
                        <v-row class="mt-0">
                            <v-col cols="2"><v-card-text>거래지역</v-card-text></v-col>
                            <v-col><v-card-text>{{ address }}</v-card-text></v-col>
                        </v-row>
                    </v-card>
                    <v-card height="60" class="d-flex justify-space-between mt-9" flat outlined>
                        <v-btn width="200" height="60">찜</v-btn>
                        <v-btn width="200" height="60">연락하기</v-btn>
                        <v-btn width="200" height="60">바로구매</v-btn>
                    </v-card>
                </v-col>
            </v-row>
            
        </v-container>
        <v-divider></v-divider>
        <v-container class="mt-3">
            <h3>연관상품</h3>
            <v-card>
                <v-row class="row1">
                    <v-col v-for="product in relatedProducts" :key="product.id" class="col" cols="2">
                        <v-card height="130" tile>
                            <v-img width="200" height="100" contain :src="imagePath+serSerarch(product.img)" />
                            <v-divider></v-divider>
                            <v-btn plain small block @click="relatedProduct(product.id)">{{ product.productName }}</v-btn>
                        </v-card>
                    </v-col>
                </v-row>
            </v-card>
        </v-container><br><br>
        <v-container>
            <v-card outlined flat>
                <v-tabs
                v-model="tab"
                fixed-tabs
                background-color="indigo"
                dark
                >
                <v-tabs-slider></v-tabs-slider>

                    <v-tab
                        href="#tab-1"
                    >
                        상품정보
                    </v-tab>
                    <v-tab
                        href="#tab-2"
                    >
                        상품문의
                    </v-tab>
                    
                </v-tabs>
                <v-tabs-items v-model="tab">
                    <v-tab-item
                        v-for="i in 2"
                        :key="i"
                        :value="'tab-' + i"
                    >
                        <v-card flat height="400px" class="pa-5">
                            <div v-if="i == 1">
                                <h3>상품정보</h3>
                                <v-divider></v-divider>
                                <p class="productinfo">{{ contentSearch(i) }}</p>
                                <v-divider></v-divider>
                                <v-row>
                                    <v-col>
                                        <v-card-subtitle>
                                            <v-icon>mdi-map-marker-radius</v-icon>
                                            거래지역
                                        </v-card-subtitle>
                                        <v-card-text>
                                            {{ address }}
                                        </v-card-text>
                                    </v-col>
                                    <v-col>
                                        <v-card-subtitle>
                                            <v-icon>mdi-menu</v-icon>
                                             카테고리
                                        </v-card-subtitle>
                                        <v-card-text>
                                            {{ item.category }}
                                        </v-card-text>
                                    </v-col>

                                </v-row>
                            </div>
                            <div v-else>
                                <h3>상품문의</h3>
                                <v-divider></v-divider>
                                <Comment/>
                            </div>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>              
            </v-card>    
        </v-container>
    </v-container>
    
</template>

<script>
import Comment from "./Comment.vue";
import axios from 'axios'
export default {
    components:{
    Comment
  },
    data() {
        return {
            item : {},
            tab: null,
            text : '',
            imagePath: 'http://localhost:8000/storage/image/',
            address : '',
            relatedProducts : []
        }

    },
    methods:{
              serSerarch(e){
                     if(!e){
                            return 'noimage.jpg'
                     }else{return e}
              },
              contentSearch(i){
                  if(i == 1){
                      this.text = this.item.content
                      return this.text
                  }
              },
              relatedProduct(id){
                    this.$router.push({path:'/item/'+id})
                    this.$router.go(this.$router.currentRoute);
                }
    },
    mounted() {
        axios.get('/item/'+this.$route.params.itemId)
              .then(response=>{
                    //  console.log(1)
                     console.log(response.data)
                     this.item=response.data[0]
                     this.address=response.data[1]
                     this.relatedProducts=response.data[2]
              })
              .catch(err => {
                     console.log(err)
              })
    },
}
</script>

<style scoped>
    .container {
        width: 1000px;
        padding: 0%;
        margin-bottom: 10px;
    }
    .row1{
        /* background: brown; */
        margin-top: 5px;
        display: flex;
        /* justify-content: space-between; */
    }

    .productinfo {
        margin-top: 20px;
        height: 200px;
    }
</style>
