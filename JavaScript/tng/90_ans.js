// API 호출 버튼 이벤트
const btnAPI = document.querySelector('#btn-api');
btnAPI.addEventListener('click', myGetDate);

// API 호출
function myGetDate() {
    // url 획득
    const url = document.querySelector('#input-url').value;

    // API 요청
    axios.get(url)
    .then(response => {
        console.log(response);
        myMakeItem(response.data);
    })
    .catch(err => console.log(err));
}

// async await 작성
async function myGetDate() {
    // url 획득
    const url = document.querySelector('#input-url').value;

    // API 요청
    axios.get(url)
    try {
        const response = await axios.get(url);
        myMakeItem(response.data);
    } catch (error) {
        console.log(error);
    }
}

function myMakeItem(data) {
    data.forEach(item => {
        // 아이템을 추가할 부모요소 획득
        const main = document.querySelector('.main');

        // 아이템 생성
        const newArticle = document.createElement('div');
        const newArticleId = document.createElement('div');
        const newImg= document.createElement('img');

        // 아이템 data 셋팅
        newArticle.classList = 'article';
        newArticleId.classList = 'div-article-id';
        newImg.classList = 'div-article-img';
        newImg.src = item.download_url;
        newArticleId.textContent = item.id;

        // 생성한 요소 결합
        newArticle.appendChild(newArticleId); // article에 id 추가
        newArticle.appendChild(newImg); // article에 이미지 추가
        main.appendChild(newArticle); // 메인에 article 추가

    });
}

// 아이템 지우기
const btnMain = document.querySelector('#btn-clear');
btnMain.addEventListener('click', () => {
    document.querySelector('.main').innerHTML = '';

    // 최대 5개까지씩 지우기
    const main = document.querySelector('.main');
    const articleList = document.querySelectorAll('.article');

    for(let i = 0; i < 5; i++){
        let idx = articleList.length - 1 - i;
        if(idx < 0){
            // index가 0보다 작으면 루프 종료
            break;
        }
        main.removeChild(articleList[idx]);
    }
});