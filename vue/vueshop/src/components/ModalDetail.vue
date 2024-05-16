
<template>
    <div class="bg_black" v-if="data.flgModal">
    <div class="bg_white">
      <!-- v-on:src 사용 -->
      <img :src="data.product.img">
      <h4>{{ data.product.productName }}</h4>
      <p>{{ data.product.productContent }}</p>
      <p>{{ data.product.price }} 원</p>
      <!-- <button @click="flgModal = !flgModal">닫기</button> -->
    </div>
  </div>
</template>

<script setup>
    import { defineProps } from 'vue';
    const data = defineProps({
        // 'products' : Array -> 없어도 되는거였음
        'product' : Object
        ,'flgModal' : Boolean
    });
    // console.log(data.products);
    // console.log(data.product);
</script>

<style>
    
</style>