<template>
  <div>
    <v-card>
      <v-card-title> 상품등록 </v-card-title>
      <v-form ref="form" v-model="valid" @submit.prevent="onSubmitForm">
        <v-card-text>
          <div><h3>*이미지업로드</h3></div>
          <br />

          <input type="file" multiple ref="imageInput" />
        </v-card-text>
        <img
          src="C:\Users\김동영\Desktop\학교\ㅅㅅ\yju_project\vuejs\src\assets\noimg.gif"
          alt=""
        />

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
          <div><h3>*판매위치</h3></div>
          <v-text-field
            :rules="saleAddressRules"
            placeholder="판매위치를 입력해주세요"
            style="width: 500px"
            v-model="saleAddress"
          />
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
          <v-checkbox v-model="delivery" label="무료배송" value="무료배송">
          </v-checkbox>
          <v-checkbox v-model="delivery" label="배송비별도" value="배송비별도">
          </v-checkbox>
        </v-card-text>
        <hr />

        <v-card-text>
          <div><h3>*상품설명</h3></div>
          <v-textarea outlined auto-grow clearable v-model="content" />
        </v-card-text>
        <v-card-text>
          <v-btn color="green" rounded large dark @click.stop="dialog = true">
            판매하기
          </v-btn>

          <v-dialog v-model="dialog" max-width="290">
            <v-card>
              <v-card-title class="text-h5"> 판매하시겠습니까? </v-card-title>

              <v-card-text> </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn color="green darken-1" text @click="dialog = false">
                  아니오
                </v-btn>

                <v-btn color="green darken-1" type="submit" @click="asd" text>
                  네
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-card-text>
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
      imagePath: "ss",
      saleAddress: "",
      productName: "",
      content: "",
      price: "",
      newProduct: "", //새상품인지 중고상품인지?
      dialog: false,
      dialogs: false,
      exchange: "", //교환가능한지?
      delivery: "", //배송비붙는지?
      saleAddressRules: [(v) => !!v || "위치정보는 필수입니다"],
      productNameRules: [(v) => !!v || "상품이름은 필수입니다"],
      priceRules: [(v) => !!v || "가격은 필수입니다"],
    };
  },
  methods: {
    onsubmitForm() {
      if (this.$refs.form.validate()) {
        console.log(this.productName);
      }
    },
    asd() {
      // console.log(this.productName);
      (this.dialog = false),
        // this.$store.dispatch("productAdd", {
        //   content: this.content,
        //   productName: this.productName,
        //   saleAddress: this.saleAddress,
        //   price: this.price,
        //   newProduct: this.newProduct,
        //   exchange: this.exchange,
        //   delivery: this.delivery,
        //   imagePath: this.imagePath,
        //   category: this.category,
        // });
        axios
          .post("/productAdd", {
            content: this.content,
            productName: this.productName,
            saleAddress: this.saleAddress,
            price: this.price,
            newProduct: this.newProduct,
            exchange: this.exchange,
            delivery: this.delivery,
            imagePath: this.imagePath,
            category: this.category,
          })
          .then(() => {
            alert("판매등록성공");
          })
          .catch(() => {});
    },
  },
};
</script>

<style >
#dong {
  /* flex-direction: column-reverse; */
  /* justify-content: center; */
}
#d {
  margin-left: 20px;
}

.text-center {
  margin-bottom: 50px;
}
</style>
