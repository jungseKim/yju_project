<template>
<<<<<<< HEAD
=======
<<<<<<< HEAD
  <v-form class="display-1 my-10" ref="form" v-model="valid">
    <v-container class="container">
      <!-- <v-row>
      <v-col cols="12" sm="6" > -->
      <h1 class="title">로그인</h1>
      <br />
      <v-text-field
        v-model="email"
        label="email"
        required
        outlined
      ></v-text-field>

      <v-text-field
        v-model="password"
        label="password"
        type="password"
        required
        outlined
      ></v-text-field>

      <v-btn
        block
        :disabled="!valid"
        color="success"
        class="mr-4"
        @click="login"
        >로그인 </v-btn
      ><br />

      <v-btn block color="primary" class="mr-4" @click="register"
        >회원가입
      </v-btn>

      <!-- </v-col>
    </v-row> -->
    </v-container>
  </v-form>
=======
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
    <v-form class="display-1 my-10" ref="form" v-model="valid">
        <v-container class="container">
            <!-- <v-row>
      <v-col cols="12" sm="6" > -->
            <h1 class="title">로그인</h1>
            <br />
            <v-text-field
                v-model="email"
                label="email"
                required
                outlined
            ></v-text-field>

            <v-text-field
                v-model="password"
                label="password"
                :type="'password'"
                required
                outlined
                @keyup.enter="login"
            ></v-text-field>

            <v-btn
                block
                :disabled="!valid"
                color="success"
                class="mr-4"
                @click="login"
                >로그인 </v-btn
            ><br />

            <v-btn block color="primary" class="mr-4" @click="register"
                >회원가입
            </v-btn>

            <!-- </v-col>
    </v-row> -->
        </v-container>
    </v-form>
<<<<<<< HEAD
=======
>>>>>>> minseong
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
</template>

<script>
export default {
<<<<<<< HEAD
=======
<<<<<<< HEAD
  data() {
    return {
      valid: true,
      email: "",
      password: "",
    };
  },

  methods: {
    login() {
      this.$store
        .dispatch("login", {
          email: this.email,
          password: this.password,
        })
        .then(() => {
          this.$router.push({ name: "map" });
        })
        .catch((err) => {
          console.log(err.message);
          alert("아이디와 비밀번호를 확인해 주세요");
        });
    },
    register() {
      if (this.$store.state.user) {
        return alert("로그 아웃후 이용해 주세요");
      } else {
        this.$router.push("register");
      }
    },
  },
=======
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
    data() {
        return {
            valid: true,
            email: "",
            password: "",
        };
    },

    methods: {
        login() {
            this.$store
                .dispatch("login", {
                    email: this.email,
                    password: this.password,
                })
                .then(() => {
                    if (!this.$store.state.user) {
                        console.log("login failed");
                        alert("아이디와 비밀번호를 확인해주세요.");
                    } else {
                        console.log("login successed");
                        this.$router.push({ name: "map" });
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        register() {
            if (this.$store.state.user) {
                return alert("로그아웃 후 이용해주세요.");
            } else {
                this.$router.push("register");
            }
        },
    },
<<<<<<< HEAD
=======
>>>>>>> minseong
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
};
</script>

<style scoped>
.class {
<<<<<<< HEAD
=======
<<<<<<< HEAD
  text-align: center;
}
.container {
  max-width: 500px;
}
</style>
=======
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
    text-align: center;
}
.container {
    max-width: 500px;
}
</style>
<<<<<<< HEAD
=======
>>>>>>> minseong
>>>>>>> 2bff7c2074d829c15758258e9843f6b46fd9ce9b
