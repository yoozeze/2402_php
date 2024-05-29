import axios from 'axios';
import { createStore } from 'vuex';
import router from './router';

const store = createStore({
    state() {
        return {
            authFlg: document.cookie.indexOf('auth=') >= 0 ? true : false,
            userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : null,
            boardData: [],
            moreBoardFlg: true,
        }
    },
    mutations: {
        // 인증 플레그 저장
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },

        // 유저 정보 저장
        // state는 store 전체 가르킴
        setUserInfo(state, userInfo) {
            // state.userInfo 는 state안에 있는 것 뒤에 userInfo는 파라미터
            state.userInfo = userInfo;
        },

        // 게시글 초기 삽입
        setBoardData(state, data) {
            state.boardData = data;
        },

        // 더보기 버튼 플래그
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg;
        },

        // 게시글 추가 (기존에 있던 게시글에 합쳐짐)
        setMoreBoardData(state, data) {
            state.boardData = [...state.boardData, ...data];
        },

        // 작성 게시글 가장 앞에 추가
        setUnshiftBoardData(state, data) {
            state.boardData.unshift(data);
        },

        // 유저 작성글 수 + 1
        setAddUserBoardsCount(state){
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', state.userInfo);
        },

    },
    actions: {
        // context는 store 가르키는 파라미터
        /**
         * 로그인 처리
         * 
         * @param {*} context 
         */
        login(context) {
            const url = '/api/login';
            const form = document.querySelector('#loginForm');
            const data = new FormData(form);

            axios.post(url, data)
            .then(response => {
                console.log(response.data); // TODO
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                context.commit('setUserInfo', response.data.data);
                context.commit('setAuthFlg', true);

                router.replace('/board'); // 이동 막아줌
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('로그인에 실패했습니다. (' + error.response.data.code + ')');
            });
        },

        /**
         * 로그아웃 처리
         * 
         * @param {*} context 
         */
        logout(context) {
            const url = '/api/logout';

            axios.post(url)
            .then(response => {
                console.log(response.data); // TODO
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('문제가 발생하여 강제 로그아웃합니다. (' + error.response.data.code + ')');
            })
            .finally(() => {
                localStorage.clear();

                context.commit('setAuthFlg', false);
                context.commit('setUserInfo', null);

                router.replace('/login');
            });
        },

        /**
         * 최초 게시글 획득
         * 
         * @param {*} context 
         */
        getBoardData(context) {
            const url = '/api/board';
            
            axios.get(url)
            .then(response => {
                console.log(response.data); // TODO
                context.commit('setBoardData', response.data.data);
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('게시글 습득에 실패했습니다.(' + error.response.data.code + ')');
            });
        },

        /**
         * 추가 게시글 획득
         * 
         * @param {*} context
         */
        getMoreBoardData(context) {
            // 마지막 게시글 번호 조회
            const lastItem = context.state.boardData[context.state.boardData.length - 1];

            const url = 'api/board/' + lastItem.id;

            axios.get(url)
            .then(response => {
                console.log(response.data); // TODO
                context.commit('setMoreBoardData', response.data.data);

                // 더보기 버튼 플래그 갱신
                if(response.data.data.length < 20) {
                    context.commit('setMoreBoardFlg', false);
                }
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('추가 게시글 습득에 실패했습니다.(' + error.response.data.code + ')');
            });
        },

        /**
         * 회원가입 처리
         * 
         * @param {*} context
         */
        registration(context) {
            const url = '/api/registration';
            const data = new FormData(document.querySelector('#registrationForm'));

            axios.post(url, data)
            .then(response => {
                console.log(response.data); // TODO
                router.replace('/login');
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('회원가입에 실패했습니다.(' + error.response.data.code + ')');
            });
        },

        /**
         * 게시글 작성
         */
        createBoard(context) {
            const url = '/api/board/create';
            const data = new FormData(document.querySelector('#boardCreateForm'));

            axios.post(url, data)
            .then(response => {
                if(context.state.boardData.length > 1) {
                    context.commit('setUnshiftBoardData', response.data.data);
                }
                context.commit('setAddUserBoardsCount');
                localStorage.setItem('userInfo', JSON.stringify(context.state.userInfo));
                
                // context.commit('setUnshiftBoardData', response.data.data);
                // context.commit('setAddUserBoardsCount');
                console.log(response.data); // TODO
                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert('글 작성에 실패했습니다.(' + error.response.data.code + ')');
            });
        },
    }
});

export default store;
