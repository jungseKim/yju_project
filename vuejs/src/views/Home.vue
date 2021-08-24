<template>
       <v-container>
              <h1>물건</h1>
              
              <v-row>
                     <v-col v-for="item in items" :key="item.id">
                            <v-card width="270px" height="270px" style="text-align:right">
                                   <v-img width="270px" max-height="150" contain :src="imagePath+serSerarch(item.img)" />
                                   <v-divider></v-divider>
                                   <v-card-title><router-link :to="'/item/'+item.id" style=" text-decoration:none">{{ item.productName }}</router-link></v-card-title>
                                   <v-card-text style="padding:0" >{{ item.price }}원</v-card-text>
                                   <v-divider></v-divider>
                                   {{ item.created_at }}
                            </v-card>
                     </v-col>

    <v-row>
      <v-col v-for="item in items" :key="item.id">
        <v-card width="270px" height="270px" style="text-align: right">
          <v-img
            width="270px"
            max-height="150"
            contain
            :src="imagePath + serSerarch(item.img)"
          />
          <v-divider></v-divider>
          <v-card-title
            ><router-link to="/item" style="text-decoration: none">{{
              item.productName
            }}</router-link></v-card-title
          >
          <v-card-text style="padding: 0">{{ item.price }}원</v-card-text>
          <v-divider></v-divider>
          {{ item.created_at }}
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      items: [],
      imagePath: "http://localhost:8000/storage/image/",
    };
  },
  methods: {
    serSerarch(e) {
      if (!e) {
        return "noimage.jpg";
      } else {
        return e;
      }
    },
  },
  mounted() {
    axios
      .get("/add")
      .then((response) => {
        console.log(response.data);
        this.items = response.data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>

<style scoped>
.container {
  max-width: 70%;
  margin-top: 20px;
}
</style>