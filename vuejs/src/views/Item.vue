<template>
    <v-container>
        <v-container>
            <v-row>
                <v-col cols="3.5">
                    1
                </v-col>
                <v-col cols="8">
                    <div class="three">3</div>
                    <div class="three">4</div>
                    <div class="three">5</div>
                </v-col>
            </v-row>
            
        </v-container>
        <v-divider></v-divider>
        <v-container>
            <h3>연관상품</h3>
            <v-card>
                <v-row class="row">
                    <v-col v-for="a in 5" :key="a" class="col" cols="2">dsds</v-col>
                </v-row>
            </v-card>
        </v-container><br><br>
        <v-container>
                <v-tabs
                fixed-tabs
                background-color="indigo"
                dark
                >
                    <v-tab

                    >
                        상품정보
                    </v-tab>
                    <v-tab

                    >
                        상품문의
                    </v-tab>
                    
                </v-tabs>
                <v-container class="qq">
                </v-container>               
        </v-container>
          <Comment/>
    </v-container>
    
</template>

<script>
import Comment from "./Comment.vue";
export default {
    components:{
    Comment
  },
}
</script>

<style scoped>
    .container {
        max-width: 1000px;
        padding: 0%;
        margin-bottom: 10px;
    }


    .row{
        background: brown;
        margin-top: 5px;
        display: flex;
        justify-content: space-between;
    }
    .col {
        background: blueviolet;
        margin: 3px;
        height: 130px;
    }
    .qq{
        background: burlywood;
        height: 500px;
    }
</style>
