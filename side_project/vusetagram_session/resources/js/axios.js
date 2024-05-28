import axios from "axios";

const axiosInstance = axios.create({
    // 기본 헤더 설정
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    // axios로 API요청 할때, 세션 쿠키가 포함되도록 하는 설정
    withCredentials: true,
});