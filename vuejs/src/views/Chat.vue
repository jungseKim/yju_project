<template>
    <v-row>
        <v-col col-12>
            sdfasdas
        </v-col >
        <v-col col-6>
            asdasd
        </v-col>
    </v-row>
</template>

<script>
import axios from 'axios'
export default {
    mounted(){
        axios.get('/chatList')
        .then(response=>{
         console.log(response.data);
        })
    }
}
</script>
