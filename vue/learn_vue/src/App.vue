<template>
    <h1>테스트</h1>
    <p>{{ cnt }}</p>
    <button @click="cnt++">증가</button>
    <main>
        <router-link to="/login"><button>로그인</button></router-link>
        <router-link to="/board"><button>게시판</button></router-link>
        <router-view></router-view>

        <button @click="movePath('/login')">JS 로그인</button>
        <button @click="movePath('/board')">JS 게시판</button>

        <!-- url 변동없이 화면만 전환됨
        <button @click="flg = 0">로그인</button>
        <button @click="flg = 1">게시판</button>
        <BoardComponent v-if="flg === 1" />
        <LoginComponetn v-if="flg === 0"/> -->
    </main>
</template>

<script setup>
    import { ref, onBeforeMount, onBeforeUnmount, onBeforeUpdate, onMounted, onUnmounted, onUpdated } from 'vue';
    import router from './router';
    // import BoardComponent from './components/BoardComponent.vue';
    // import LoginComponetn from './components/LoginComponent.vue';

    // 컴포넌트 전환용 플래그
    // const flg = ref(0);
    
    // --------------------------------------------------------------------------------------------------------------
    // js에서 vue route 사용
    function movePath(path){
        // push('경로') : URL 히스토리를 추가하면서 URL 이동
        // router.push(path);

        // replace('경로') : URL 히스토리를 추가하지 않고 URL 이동
        router.replace(path);
    }


    // 라이프 사이클 테스트용
    const cnt = ref(0);
    onBeforeMount(() => {
        console.log('비포 마운트'); // 실제로 화면에 출력
    });
    onMounted(() => {
        console.log('마운티드');
    });
    onBeforeUpdate(()=>{
        console.log('비포 업데이트'); // 화면에 변화가 없어서 출력 x
        if(cnt.value === 5) {
            cnt.value = 0;
        }
    });
    onUpdated(()=>{
        console.log('업데이티드'); 
    });
    onBeforeUnmount(()=>{
        console.log('비포 언마운트'); // vs 코드 저장하면 출력
    });
    onUnmounted(()=>{
        console.log('언마운티드');
    });

</script>

<style>
    #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
    }
</style>
