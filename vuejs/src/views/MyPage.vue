<template>
<<<<<<< HEAD
=======
<<<<<<< HEAD
  <v-container fluid>
    <v-row no-gutters>
      <v-col col-4>
        <v-img
          class="profileImg"
          max-height="150"
          max-width="150"
          src="https://picsum.photos/id/11/500/300"
        ></v-img>
      </v-col>
      <v-col col-2>
        <h1>이유비ds</h1>
        <h2>orbi98@naver.com</h2>
        <v-btn>follow</v-btn>
        <p>6 followers 8 following</p>
        <p>우편번호 : 785611</p>
        <p>경상북도 포항시 북구</p>
      </v-col>
      <v-col v-for="count in 4" :key="count" col-6></v-col>
    </v-row>
    <br />
    <h1>판매중인 상품</h1>
    <br v-for="count in 3" :key="count" />
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
  </v-container>
=======
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
    <div>
        MyPage
        <v-btn @click="deleteAccount">회원탈퇴</v-btn>
        <div>{{ text }}</div>
    </div>
<<<<<<< HEAD
=======
>>>>>>> minseong
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
</template>

<script>
import axios from "axios";
export default {
<<<<<<< HEAD
    data() {
=======
<<<<<<< HEAD
  data() {
    return {
      tabs: null,
    };
  },
};
=======
    data(){
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
        return {
            text: null,
        };
    },
    methods: {
        deleteAccount() {
            var code = Math.floor(Math.random() * 899999 + 100000);
            var inputCode = prompt(
                `탈퇴하려면 아래의 코드를 입력해주세요.\n${code}`
            );
            if (code == inputCode) {
                if (confirm("정말 회원 탈퇴하시겠습니까?")) {
                    axios.post("/deleteAccount").then((res) => {
                        this.$store.dispatch("logout");
                        const home = window.location.origin;
                        this.text = res.data;
                        alert(this.text);
                        location.href = home;
                    });
                }
            } else {
                alert("코드가 일치하지 않습니다.");
            }
        },
<<<<<<< HEAD
    },
};
=======
    }
}
>>>>>>> minseong
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
</script>

<style>
.profileImg {
    width: 150px;
    height: 150px;
    border-radius: 70%;
    overflow: hidden;
}
</style>
