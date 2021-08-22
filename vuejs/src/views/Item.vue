<template>
    <v-container>
        <v-container>
            <v-row class="row1">
                <v-img width="200" max-height="400" contain :src="'http://localhost:8000/storage/image/KakaoTalk_20210418_150600792_1628837294.jpg'" />
                <v-col cols="8">
                    <v-card height="120" class="mb-1">1</v-card>
                    <v-card height="120" class="mb-1">2</v-card>
                    <v-card height="120" class="mb-1">3</v-card>
                </v-col>
            </v-row>
            
        </v-container>
        <v-divider></v-divider>
        <v-container>
            <h3>연관상품</h3>
            <v-card>
                <v-row class="row">
                    <v-col v-for="a in 5" :key="a" class="col" cols="2">
                        <v-card height="130">
                            <v-img width="200" max-height="100" contain :src="'http://localhost:8000/storage/image/KakaoTalk_20210418_150600792_1628837294.jpg'" />
                            <v-divider></v-divider>
                            제목적어주기
                        </v-card>
                    </v-col>
                </v-row>
            </v-card>
        </v-container><br><br>
        <v-container>
            <v-card>
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
                        <v-card flat height="400px">
                        <v-card-text>{{ text }}</v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>              
            </v-card>    
        </v-container>
    </v-container>
    
</template>

<script>
export default {
    data() {
        return {
            tab: null,
            text : 'sdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff'
        }

    }
}
</script>

<style scoped>
    .container {
        max-width: 1000px;
        padding: 0%;
        margin-bottom: 10px;
    }
    .three {
        height: 120px;
    }

    .row{
        background: brown;
        margin-top: 5px;
        display: flex;
        justify-content: space-between;
    }

    .qq{
        background: burlywood;
        height: 500px;
    }
</style>
