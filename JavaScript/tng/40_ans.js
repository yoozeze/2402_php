// 함수 두근두근
const MYDOKIDOKI = () => {
    alert('두근두근');
}

// 함수 들켰다
const MYBUSTED = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    const DIV_BOX = document.querySelector('.box');
    alert('들켰다!');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', MYBUSTED); // 기존 들켰다 이벤트 제거
    DIV_BOX.addEventListener('click', MYHIDE); // 숨는다 이벤트 추가
    DIV_CONTAINER.removeEventListener('mouseenter', MYDOKIDOKI); // 기존 두근두근 이벤트 제거  
}

// 함수 숨는다
const MYHIDE = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    const DIV_BOX = document.querySelector('.box');
    alert('다시 숨는다.');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', MYHIDE); // 기존 숨는다 이벤트 제거
    DIV_BOX.addEventListener('click', MYBUSTED); // 들켰다 이벤트 추가
    DIV_CONTAINER.addEventListener('mouseenter', MYDOKIDOKI); // 두근두근 이벤트 추가

    // 랜덤 위치 조절
    // 랜덤값 * (브라우저 너비|높이 - div.container 너비|높이)의 반올림
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - 100)); // window.innerWidth 브라우저의 전체 길이,  -100은 상자크기 만큼 제거(안하면 브라우저 밖으로 나가서 스크롤 생성됨)
    const RANDOM_Y = Math.round(Math.random() * (window.innerHeight - DIV_CONTAINER.offsetWidth)); // 같은 값을 들어가지 않게 랜덤식 2개 만듦, DIV_CONTAINER.offsetWidth는 박스 높이 알아서 가져옴
    DIV_CONTAINER.style.top = `${RANDOM_Y}px`;
    DIV_CONTAINER.style.left = `${RANDOM_X}px`; 
}
// 최초로 한번만 실행되는 함수 
(() => {
    // 1. 버튼을 클릭 시 아래 내용의 알러트가 나옵니다.
    // "안녕하세요"
    // "숨어있는 div를 찾아보세요."
    const BTN_INFO = document.querySelector("#btn-info");
    BTN_INFO.addEventListener('click', () => (alert('안녕하세요. \n숨어있는 div를 찾아보세요.')));
    
    // 2. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
    // "두근두근"
    const DIV_CONTAINER = document.querySelector('.container');
    DIV_CONTAINER.addEventListener('mouseenter', MYDOKIDOKI);
    
    // 2-2. 들킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야 합니다.
    
    // 3. 2번 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
    // "들켰다!"
    const DIV_BOX = document.querySelector('.box');
    DIV_BOX.addEventListener('click', MYBUSTED);   
    
    // 4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 다시 숨는다.
    // "다시 숨는다."
    
    // 4-2. 다시 숨을 때 위치 랜덤
})();

