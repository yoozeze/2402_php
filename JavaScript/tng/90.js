function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('.input').value;

    // Axios 처리
    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);    
    })
    .catch(err => console.log(err));
}

// 사진 데이터를 화면에 추가하는 함수
function myMakeImg(data) {
    data.forEach(item => {
        const CONTAINER = document.querySelector('.container');

        // img-container 생성
        const ADD_CONTAINER = document.createElement('div');
        ADD_CONTAINER.setAttribute('class', 'img-container');
        
        CONTAINER.appendChild(ADD_CONTAINER);

        // 이미지 번호 추가
        const ADD_IMGTITLE = document.createElement('div');
        ADD_IMGTITLE.setAttribute('class', 'img-title');
        ADD_IMGTITLE.textContent = item.id;

        ADD_CONTAINER.appendChild(ADD_IMGTITLE);

        // 이미지 추가
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.setAttribute('class','img');

        ADD_CONTAINER.appendChild(ADD_IMG);
    });
}

// API호출 버튼 이벤트
const BTN_API = document.querySelector('.btn-api');
BTN_API.addEventListener('click', myAxiosGet);

// API삭제 버튼 이벤트
function mydelete() {
    const TARGET = document.querySelector('.box2');
    const BOX_DELETE = document.querySelector('.container');
    TARGET.removeChild(BOX_DELETE);
    // document.body : body에 접근할때
}

function add_box() {
    const TARGET = document.querySelector('.box2');
    const ADD_BOX = document.createElement('div');
    ADD_BOX.setAttribute('class', 'container');
    TARGET.appendChild(ADD_BOX);
}

const DELETE = document.querySelector('.delete');
DELETE.addEventListener('click', mydelete);
DELETE.addEventListener('click', add_box);