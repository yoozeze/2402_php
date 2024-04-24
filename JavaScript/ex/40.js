// 함수 표현식
const FNC1 = (a, b) => a + b;
// 함수 선언식
function myFnc1(a, b){
    return a + b;
}

// 이벤트

// 인라인 이벤트
// 명령과 호출이 각각 다른파일에 있어서 관리하기 힘들다
function myAlert() {
    alert('안녕하세요. myAlert()');
}

// 프로퍼티 리스너
// 자바스크립트 파일내에서만 사용
const BTN2 = document.querySelector('#btn2');
BTN2.onclick = () => (alert('안녕하세요.'));
// BTN2.onclick = myAlert(); -> myAlert()는 함수를 바로 실행시키겠다는 의미
// BTN2.onclick = myAlert; -> myAlert는 콜백함수로서 나중에 실행시키겠다는 의미

// addEventListener
const BTN3 = document.querySelector('#btn3');
BTN3.addEventListener('click', () => (alert('버튼 3')));
BTN3.addEventListener('click', function(){
    alert('버튼 3.1')
});
BTN3.addEventListener('click', test);
// removeEventListener() : 이벤트 추가시 사용했던 이벤트 형식과 콜백함수가 완전 동일해야 함
BTN3.removeEventListener('click', function(){
    alert('버튼 3.1')
}); // 삭제 안됨 위에 함수랑 다른 객체이기 때문에

// add할때랑 remove할때 같은 형식으로 만들어줘야함
BTN3.removeEventListener('click', test);

function test() {
    alert('test함수 알러트')
}

// 이벤트 객체 (like PHP에서 슈퍼글로벌변수)
const BTN4 = document.querySelector('#btn4');
BTN4.addEventListener('click', e => (console.log(e)));
BTN4.addEventListener('click', e => {
    console.log(e);
    console.log(e.target.value);
    e.target.style.color = 'red';
});

// 마우스가 진입했을 때 이벤트
const MOUSEENTER = document.querySelector('#MOUSEENTER');
MOUSEENTER.addEventListener('mouseenter', e => {
    console.log(e);
    e.target.style.color = 'red';
    window.open('https://naver.com', '', 'width=50 height=50');
});

// --------------------------------------------------------
// 팝업
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    window.open('https://naver.com', '', 'width=500 height=500');
})

// 모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', toggleModalConainer);

function toggleModalConainer() {
    const MODAL_CONTAINER = document.querySelector('.modal-container');
    MODAL_CONTAINER.classList.toggle('display-none');
}

// 모달 컨테이너 영역 클릭시 모달 닫기
const MODAL_CONTAINER = document.querySelector('.modal-container');
MODAL_CONTAINER.addEventListener('dblclick', toggleModalConainer);

// 모달 아이템 영역 눌렀을 때 안꺼지게 하는 방법 중 하나
const TEST = document.querySelector('.modal-item');
TEST.addEventListener('click', toggleModalConainer);

// 마우스를 눌렀을 때 이벤트
const H1 = document.querySelector('h1');
// 클릭
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'red';
})
// 땠을때
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = 'white';
})

// 마우스 포인터가 진입했을 때 이벤트
H1.addEventListener('mouseenter', e => {
    e.target.style.color = 'orange';
})
// 마우스 포인터가 벗어났을 때 이벤트
H1.addEventListener('mouseleave', e => {
    e.target.style.color = 'black';
})
// 더블클릭 
