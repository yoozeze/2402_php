// 1. 요소 선택
// 고유한 ID로 요소 선택
const TITLE = document.getElementById('title');
console.log(TITLE);
TITLE.style.color ='blue';

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');
// H1[1].style.color = 'green';
H1[1].style = 'color: green; font-size: 3rem; background: #5f5f5f;';
console.log(H1[1]);

// 클래스 요소를 선택
const CLASS_ELE = document.getElementsByClassName('none-li');
console.log(CLASS_ELE);

// CSS 선택자를 이용해서 요소를 선택, 가장 많이 사용
// ID
const CSS_ID = document.querySelector('#title');
console.log(CSS_ID);
// CLASS
const CSS_CLS = document.querySelector('.none-li');
console.log(CSS_CLS); // 가장 최상단에 있는 클래스 1개만 가져옴
CSS_CLS.style.color = 'red'; // 스타일도 1개만 적용됨

const CSS_CLS_ALL = document.querySelectorAll('.none-li');
console.log(CSS_CLS_ALL);
// 특정 하나만 지정
CSS_CLS_ALL[1].style.color = 'green'; 
// 전체 스타일 지정 (배열이기때문에 forEach로 돌림)
CSS_CLS_ALL.forEach(node => node.style.color = 'blue'); 

// 지뢰찾기만 불러오기
const Z = document.querySelectorAll('.none-li')[1];
console.log(Z);
const Z1 = document.querySelectorAll('ul > li')[1]
console.log(Z1);
// ul의 li자식 중 2번째 자식 선택
const Z2 = document.querySelector('ul > li:nth-child(2)');
console.log(Z2);

// --------------------------------------------------------------------------------------

// 2. 요소 조작
// textContent : 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달 
TITLE.textContent = '텍스트 컨텐츠로 바꿈';
TITLE.textContent = '<a>링크</a>';

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달 (h1태그 안에 a태그를 넣음)
TITLE.innerHTML = '<a>링크</a>';
H1[1].innerHTML = '<input type="radio">라디오</input>';

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder', '값값값');
INPUT1.setAttribute('name', 'input1');
console.log(INPUT1);

// removeAttribute(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');

// ---------------------------------------------------------------------------------------

// 3. 요소 스타일링
TITLE.style = '';
console.log(TITLE);

H1[1].removeAttribute('style');
console.log(H1[1]);

// style : 인라인으로 스타일 추가
TITLE.style.color ='blue';
TITLE.removeAttribute('style');

// classList : 클래스로 스타일 추가 및 삭제
// add() : 추가
TITLE.classList.add('font-color-red');  // 1개만 추가
TITLE.classList.add('font-color-red','css1','css2'); // 여러개 추가
console.log(TITLE);

// classList.remove() : 제거
TITLE.classList.remove('font-color-red');

// classList.toggle() : 해당 클래스를 토글
TITLE.classList.toggle('none');
TITLE.classList.toggle('none');


// 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정
// 방법1
const CSS_LI_ALL = document.querySelectorAll('li');
console.log(CSS_LI_ALL);
CSS_LI_ALL.forEach((val, key) => {
    if(key % 2 === 0){
        val.style.color = 'blue';
    } else {
        val.style.color = 'red';
    }
});
// 나라 방법2
const UL_LI_ODD = document.querySelectorAll('#ul li:nth-child(odd)');
UL_LI_ODD.forEach(node => node.style.color = 'red');
const UL_LI_EVEN = document.querySelectorAll('#ul li:nth-child(even)');
UL_LI_EVEN.forEach(node => node.style.color = 'blue');












// CSS_LI_ALL.forEach(function(colorChange){
//     // if( n % 2 === 0){
//     //     colorChange.style.color = 'blue'
//     // } else {
//     //     colorChange.style.color = 'red'
//     // }
//     for(CSS_LI_ALL in arr) {
//         if(arr % 2 === 0){
//             colorChange.style.color = 'blue'
//         } else {
//             colorChange.style.color = 'red'
//         }
//     }
// })
