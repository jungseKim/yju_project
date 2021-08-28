<template>
    <div>
        MyPage
        <v-btn @click="deleteAccount">회원탈퇴</v-btn>
        <div>{{ text }}</div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
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
    },
};
</script>

<style>
.profileImg {
    width: 150px;
    height: 150px;
    border-radius: 70%;
    overflow: hidden;
}
</style>
