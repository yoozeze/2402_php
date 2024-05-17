
<template>
  <Transition name="container">
    <div class="bg_black" v-if="data.flgModal">
      <div class="bg_white">
        <!-- v-on:src 사용 -->
        <img :src="data.product.img">
        <h4>{{ data.product.productName }}</h4>
        <p>{{ data.product.productContent }}</p>
        <p>{{ data.product.price }} 원</p>
        <p>총액 : {{ data.product.price * cnt }} 원</p>
        <input type="number" min="1" v-model="cnt">
        <br><br>
        <!-- $emit : 부모에게 실행시켜달라고 요청하는것 -->
        <button @click="close">닫기</button>
        <!-- 파라미터 연습용
        <button @click="$emit('myCloseModal', data.product.productName)">닫기</button> -->
      </div>
    </div>
  </Transition>
</template>

<script setup>
  import { defineEmits, defineProps, ref } from 'vue';
  const data = defineProps({
      // 'products' : Array -> 없어도 되는거였음
      'product' : Object
      ,'flgModal' : Boolean
  });
  // console.log(data.products);
  // console.log(data.product);

  const emit = defineEmits(['myCloseModal'])

  // 총액 처리 부분
  const cnt = ref(1);
  function close() {
    cnt.value = 1
    emit('myCloseModal')
  }
</script>

<style>
  .container-enter-from {
    opacity: 0;
  }
  .container-enter-active {
    transition: 0.3s ease;
  }
  .container-enter-to {
    opacity: 1;
  }

  .container-leave-from {
    transform: translateX(0px);
  }
  .container-leave-active {
    transition: all 0.5s;
  }
  .container-leave-to {
    transform: translateX(2133px);
  }
</style>