


import axios from 'axios'


export default{
    namespaced:true,
    state:()=>({
        
    }),
    mutations:{
       
    },
    getters:{
       
    },
    actions:{
        productAdd(payload){
            
           axios.post('/productAdd',{
                content: payload.content,
            productName:payload.productName,
            saleAddress:payload.saleAddress,
            price:payload.price,
            newProduct:payload.newProduct,
            exchange:payload.exchange,
            delivery:payload.delivery,
            })
            .then(()=>{
                alert('판매등록성공');
            })
            .catch(()=>{
    
            })
        }
    }
}