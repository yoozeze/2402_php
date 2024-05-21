import axios from 'axios';

const axiosInstance = axios.create({
    // 기본 URL 설정
    // 프론트랑 백엔드 서버가 물리적으로 나누어져 있을때 사용
    // baseURL: 'http://112.222.157.156:6006',

    // 기본 헤더 설정
    headers: {
        'Content-Type': 'application/json'
    }
});

export default axiosInstance;