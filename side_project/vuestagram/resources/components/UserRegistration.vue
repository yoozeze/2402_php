<template>
    <div class="form-box">
        <h3 class="form-title">회원가입</h3>
        <input type="text" name="account" placeholder="아이디">
        <input type="password" name="password" placeholder="비밀번호" autoComplete="off">
        <input type="password" name="password_chk" placeholder="비밀번호 확인" autoComplete="off">
        <input type="text" name="name" placeholder="이름" autoComplete="off">
        <div class="radio-box">
        <div>
            <label for="male">남자</label>
            <input type="radio" name="name" id="male" value="0">
        </div>
        <div>
            <label for="female">여자</label>
            <input type="radio" name="name" id="female" value="1">
        </div>
        </div>
        <input type="file" name="img" accept="image/*">
        <hr>
        <button @click="store.dispath('registUser', userRegist)" class="btn btn-submit btn-bg-black">가입</button>
        <button @click="$router.back()" class="btn btn-submit">취소</button>
    </div>
</template>

<script setup>
    // import store from '../js/store';
    import { reactive, ref } from 'vue';

        const userRegist = reactive({
            account: '',
            password: '',
            gender: '',
            name: '',
            profile: null,
        });

        const preview = ref('');

        function setFile(e) {
            userRegist.img = e.target.files[0];
            preview.value = URL.createObjectURL(userRegist.img);
        }
</script>

<style>
</style>
