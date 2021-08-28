<template>
  <v-form mt-10 ref="form">
    <v-container>
      <h1 class="title">회원가입</h1>
      <br />
      <span>이름</span>
      <v-text-field
        v-model="name"
        :counter="10"
        :rules="nameRules"
        label="Name"
        required
        outlined
      ></v-text-field>
      이메일
      <v-text-field
        v-model="email"
        :rules="emailRules"
        label="E-mail 입력"
        required
        outlined
      ></v-text-field>

      비밀번호
      <v-text-field
        type="password"
        v-model="password"
        :rules="passwordRules"
        label="password 입력"
        required
        outlined
      ></v-text-field>

      비밀번호 확인
      <v-text-field
        type="password"
        v-model="password2"
        label="password 확인"
        required
        outlined
      ></v-text-field>

      <div class="daummap">
        <v-text-field
          @click="showApi"
          type="addressNum"
          required
          readonly
          v-model="addressNum"
          label="우편번호"
        >
        </v-text-field>
        <v-text-field
          v-model="address"
          @click="showApi"
          readonly
          required
          label="주소"
        >
        </v-text-field>
        <v-icon>mdi-home</v-icon>
        <v-btn @click="showApi">주소찾기</v-btn><br /><br />
        <div ref="embed"></div>
      </div>

      <v-btn
        block
        :disabled="!buttonActivation"
        color="success"
        class="mr-4"
        @click="validate"
      >
        go register
      </v-btn>
    </v-container>
  </v-form>
</template>

<script>
import axios from "axios";
export default {
  name: "daumMap",

  data: () => ({
    valid: false,
    name: "",
    password: "",
    password2: "",
    email: "",
    password_confirmation: true,
    address: "",
    addressNum: "",

    nameRules: [
      (v) => !!v || "이름을 입력해주세요.",
      (v) => (v && v.length <= 10) || "이름은 10글자 이하로 입력해주세요.",
    ],
    emailRules: [
      (v) => !!v || "이메일을 입력해주세요.",
      (v) => /.+@.+\..+/.test(v) || "이메일 형식이 올바르지 않습니다.",
    ],
    passwordRules: [
      (v) => !!v || "비밀번호를 입력해주세요.",
      (v) => v.length > 7 || "비밀번호는 최소 8자 이상으로 입력해주세요.",
    ],
  }),

  computed: {
    buttonActivation: function() {
      if (
        this.addressNum === "" ||
        this.name === "" ||
        this.password === "" ||
        this.password2 === "" ||
        this.address === "" ||
        this.email === "" ||
        this.password !== this.password2 ||
        /.+@.+\..+/.test(this.email) == false
      ) {
        return false;
      } else return true;
    },
  },

  methods: {
    showApi() {
      new window.daum.Postcode({
        oncomplete: (data) => {
          let fullRoadAddr = data.roadAddress;
          let extraRoadAddr = "";
          if (data.bname !== "" && /[동|로|가]$/g.test(data.bname)) {
            extraRoadAddr += data.bname;
          }
          if (data.buildingName !== "" && data.apartment === "Y") {
            extraRoadAddr +=
              extraRoadAddr !== ""
                ? ", " + data.buildingName
                : data.buildingName;
          }
          if (extraRoadAddr !== "") {
            extraRoadAddr = " (" + extraRoadAddr + ")";
          }
          if (fullRoadAddr !== "") {
            fullRoadAddr += extraRoadAddr;
          }
          this.addressNum = data.zonecode;
          this.address = fullRoadAddr;
        },
      }).open();
    },

    validate() {
      if (this.password != this.password2) {
        return alert("비밀번호가 일치하지 않습니다.");
      } else {
        this.password_confirmation = true;
      }
      console.log(this.address);
      axios
        .post("/register", {
          email: this.email,
          name: this.name,
          password: this.password,
          password_confirmation: this.password_confirmation,
          address: this.address,
        })
        .then((response) => {
          console.log(response.status);
          this.$router.push("/login");
        })
        .catch((err) => {
          // err.response.data;
          console.log("register error");
          if (err.response.data.email.length == 1) {
            alert("이미 사용 중인 이메일입니다. 이메일을 다시 입력해주세요.");
          } else
            alert("사용 불가능한 이메일 입니다. 이메일을 다시 입력해주세요.");
          this.email = "";
        });
    },
    reset() {
      this.$refs.form.reset();
    },
  },
};
</script>

<style scoped>
.title {
  text-align: center;
}
.container {
  max-width: 500px;
}
</style>
