<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <!-- 포릅스 Props : 자식 컴포넌트에게 props 속성을 이용해서 데이터를 전달 -->
  <HeaderComponent :nav="nav"/>
  <ModalDetail :product="product" :flgModal="flgModal"/>

  <!-- <div class="nav">
    <a href="#" v-for="item in nav" :key="item.navName">
      {{ item.navName }}
    </a>
  </div> -->
  <div>
    <!-- <div>
      <h4>{{ pants }}</h4>
      <p>{{ price }} 원</p>
      <button @click="price += 1000">가격증가</button>
    </div>
    <div>
      <h4>티셔츠</h4>
      <p>{{ price / 2 }} 원</p>
    </div>
    <div>
      <h4>양말</h4>
      <p> {{ price / 10 }} 원</p>
    </div> -->

    <!-- <div>
      <h4>{{ products[0].productName }}</h4>
      <p>{{ products[0].price }} 원</p>
      <button @click="products[0].price += 1000">가격증가</button>
    </div>
    <div>
      <h4>{{ products[1].productName }}</h4>
      <p>{{ products[1].price }} 원</p>
      <button @click="products[1].price += 1000">가격증가</button>
    </div>
    <div>
      <h4>{{ products[2].productName }}</h4>
      <p>{{ products[2].price }} 원</p>
      <button @click="products[2].price += 1000">가격증가</button>
    </div> -->

    <!-- <div>
      <h4 @click="myOpenModal(products[0])">{{ products[0].productName }}</h4>
      <p>{{ products[0].price }} 원</p>
    </div>
    <div>
      <h4 @click="myOpenModal(products[1])">{{ products[1].productName }}</h4>
      <p>{{ products[1].price }} 원</p>
    </div>
    <div>
      <h4 @click="myOpenModal(products[2])">{{ products[2].productName }}</h4>
      <p>{{ products[2].price }} 원</p>
    </div> -->

    <!-- 위에 것 루프 -->
    <div v-for="item in products" :key="item.productName">
      <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
      <p>{{ item.price }} 원</p>
    </div>
  </div>

  <!-- 모달 -->
  <!-- <div class="bg_black" v-if="flgModal">
    <div class="bg_white">
      v-on:src 사용
      <img :src="product.img">
      <h4>{{ product.productName }}</h4>
      <p>{{ product.productContent }}</p>
      <p>{{ product.price }} 원</p>
      <button @click="flgModal = !flgModal">닫기</button>
    </div>
  </div> -->

</template>

<script setup>
  import { ref, reactive } from 'vue';
  import HeaderComponent from './components/HeaderComponent.vue'; // 자식 컴포넌트 import
  import ModalDetail from './components/ModalDetail.vue';
  // 데이터 바인딩
  // ref : 타입제한 없이 사용가능하나 일반적으로 string, number, boolean 과 같은 기본유형에 대한 반응적 참조를 위해 사용
  // import { ref } from 'vue';
  // const pants = ref('청바지');
  // console.log(pants);
  // const price = ref(10000);

  // reactive : 객체 타입만 사용 가능, 해당 객체에 대한 반응적 참조를 위해 사용
  const products = reactive([
    {productName: '바지', price: 10000, productContent: '매우 배가 고픕니다.', img: require('@/assets/img/03_아.gif')}
    ,{productName: '티셔츠', price: 5000, productContent: '매우 맛있습니다.', img: require('@/assets/img/03_우물우물.gif')}
    ,{productName: '양말', price: 1000, productContent: '더 달라고!', img: require('@/assets/img/03_땡깡-1.gif')}
  ]);

  console.log(products[0]);

  // ---------------------------------------------------------------------------------------------------------------------
  // 헤더 : nav용
  const nav = reactive([
    {navName: '홈'}
    ,{navName: '상품'}
    ,{navName: '기타'}
  ]);

  // ---------------------------------------------------------------------------------------------------------------------
  // 모달용
  const flgModal = ref(false); // 모달 표시용 플래그
  // const로 설정할 경우 값이 바뀔수가 없어서 let으로 설정
  let product = reactive({});
  function myOpenModal(item) {
    flgModal.value = !flgModal.value;
    product = item;
  }

</script>

<style>
  @import url('./assets/css/common.css');
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }



  /* css 파일 따로 분리 */
  /* .nav{
      background-color: #2c3e50;
      padding: 15px;
      border-radius: 10px;
  }
    
  .nav a {
  color: white;
  padding: 10px;
  text-decoration: none;
  } */

</style>
