<template>
    <v-container>
        <v-container class="mb-5">
            <v-row>
                <v-img width="200" max-height="400" contain :src="'http://localhost:8000/storage/image/KakaoTalk_20210418_150600792_1628837294.jpg'" />
                <v-col cols="8" class="pa-0">
                    <v-card height="100" class="mb-1" flat outlined>
                        <h1 align="center">여기는 제목 칸 입니다</h1>
                        <h2 align="right">여기는 금액 칸</h2>
                    </v-card>
                    <v-divider></v-divider>
                    <v-card height="200" class="mb-1" flat outlined>
                        <v-row>
                            <v-col cols="2"><v-card-text>상품상태</v-card-text></v-col>
                            <v-col><v-card-text>중고</v-card-text></v-col>
                        </v-row>
                        <v-row class="mt-0">
                            <v-col cols="2"><v-card-text>교환여부</v-card-text></v-col>
                            <v-col><v-card-text>교환불가능</v-card-text></v-col>
                        </v-row>
                        <v-row class="mt-0">
                            <v-col cols="2"><v-card-text>거래지역</v-card-text></v-col>
                            <v-col><v-card-text>대구광역시 북구</v-card-text></v-col>
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
            item : {},
            tab: null,
            text : ''
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

    .row1{
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
