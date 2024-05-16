<!-- 두 단어 이상의 조합으로 파일 이름 짓기 -->
<template>
    <!-- 헤더 -->
    <div class="nav">
    <a href="#" v-for="item in data.nav" :key="item.navName">
      {{ item.navName }}
    </a>
  </div>
</template>

<script setup>
  import { defineProps } from 'vue';
  const data = defineProps({
    'nav': Array
  });

  // console.log(data);
</script>

<style>
    
</style>