<template>
  <div>
    <v-card>
      <v-card-title> 상품등록 </v-card-title>
      <v-form ref="form" v-model="valid" @submit.prevent="onsubmitForm">
        <v-card-text>
          <div><h3>*이미지업로드</h3></div>
          <br />

          <div v-if="!image">
            <h2>Select an image</h2>

            <input
              ref="productImage"
              type="file"
              @change="onFileChange"
              name="imgfile"
              enctype="multipart/form-data"
            />
          </div>
          <div v-else>
            <img :src="image" />
            <button type="button" @click="removeImage">Remove image</button>
          </div>
        </v-card-text>

        <hr />

        <v-card-text>
          <div><h3>*제목</h3></div>
          <v-text-field
            :rules="productNameRules"
            placeholder="상품을 입력해주세요"
            style="width: 500px"
            v-model="productName"
          >
          </v-text-field>
        </v-card-text>
        <hr />

        <v-card-text>
          <div><h3>*카테고리</h3></div>
          <p>{{ category }}</p>
          <br />
          <v-row id="dong">
            <v-col id="d" cols="1">
              <v-dialog v-model="dialogs" scrollable max-width="300px">
                <template v-slot:activator="{ on, attrs }">
                  <v-btn color="primary" dark v-bind="attrs" v-on="on" large>
                    카테고리선택
                  </v-btn>
                </template>
                <v-card>
                  <v-card-title>Select Country</v-card-title>
                  <v-divider></v-divider>
                  <v-card-text style="height: 300px">
                    <v-radio-group v-model="category" column>
                      <v-radio label="의류" value="의류"></v-radio>
                      <v-radio label="신발" value="신발"></v-radio>
                      <v-radio label="가전제품" value="가전제품"></v-radio>
                      <v-radio label="식품" value="식품"></v-radio>
                      <v-radio label="뷰티/미용" value="뷰티/미용"></v-radio>
                      <v-radio
                        label="가구/인테리어"
                        value="가구/인테리어"
                      ></v-radio>
                      <v-radio
                        label="스포츠/레저"
                        value="스포츠/레저"
                      ></v-radio>
                      <v-radio label="도서/티켓" value="도서/티켓"></v-radio>
                      <v-radio label="기타" value="기타"></v-radio>
                    </v-radio-group>
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions>
                    <v-btn color="blue darken-1" text @click="dialogs = false">
                      Close
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="dialogs = false">
                      Save
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-col>
          </v-row>
        </v-card-text>
        <hr />

        <v-card-text>
          <div><h3>*상품상태</h3></div>
          <p>{{ newProduct }}</p>
          <v-checkbox v-model="newProduct" label="새상품" value="새상품">
          </v-checkbox>
          <v-checkbox v-model="newProduct" label="중고상품" value="중고상품">
          </v-checkbox>
        </v-card-text>
        <hr />

        <v-card-text>
          <div><h3>*교환</h3></div>

          <v-checkbox v-model="exchange" label="교환가능" value="교환가능">
          </v-checkbox>
          <v-checkbox v-model="exchange" label="교환불가" value="교환불가">
          </v-checkbox>
        </v-card-text>
        <hr />

        <v-card-text>
          <div><h3>*가격</h3></div>
          <v-text-field
            :rules="priceRules"
            placeholder="가격을 입력해주세요"
            v-model="price"
            style="width: 200px"
          />
        </v-card-text>
        <hr />

        <v-card-text>
          <div><h3>*상품설명</h3></div>
          <v-textarea outlined auto-grow clearable v-model="content" />
        </v-card-text>

        <v-btn color="green darken-1" type="submit"> 네 </v-btn>
      </v-form>
    </v-card>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      category: "",
      valid: false,
      productImage: "",
      image: "",
      productName: "",
      content: "",
      price: "",
      newProduct: "", //새상품인지 중고상품인지?
      dialog: false,
      dialogs: false,
      exchange: "", //교환가능한지?

      productNameRules: [(v) => !!v || "상품이름은 필수입니다"],
      priceRules: [(v) => !!v || "가격은 필수입니다"],
    };
  },
  mounted() {
    console.log(this.$store.state.user.user.id);
  },
  methods: {
    onsubmitForm() {
      console.log(this.productImage);
      if (this.$refs.form.validate()) {
        const form = new FormData();
        form.append("category", this.category);
        form.append("content", this.content);
        form.append("productName", this.productName);
        form.append("price", this.price);
        form.append("newProduct", this.newProduct);
        form.append("exchange", this.exchange);
        form.append("userId", this.$store.state.user.user.id);
        form.append("productImage", this.productImage);
        axios
          .post("/addProduct", form)
          .then((res) => {
            alert("판매등록성공");
            console.log(res);
          })
          .catch((err) => {
            console.log(this.image + "sadasd");
            console.log(err);
          });
      }
    },
    onFileChange(e) {
      this.productImage = this.$refs.productImage.files[0];
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var reader = new FileReader();
      var vm = this;
      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function () {
      this.image = "";
    },
  },
};
</script>

<style >
#d {
  margin-left: 20px;
}

.text-center {
  margin-bottom: 50px;
}
</style>
