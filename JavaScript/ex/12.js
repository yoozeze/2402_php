// 함수 function
// 입력을 받아 출력을 하는 일련의 과정을 정의한 것

// 함수 선언식
// 호이스팅에 영향을 받고, 재할당이 가능함, 이름 중복되지 않도록 하기
function mySum(a, b) {
    return a + b;
}
console.log(mySum(1, 2));

function mySum(a, b) {
    console.log('재할당');
} // mySum 덮어쓰기 됨

// 함수 표현식
// 호이스팅에 영향 받지않고, 재할당 방지
const FNC_MY_SUM = function (a, b) { // function (a, b) -> 익명함수
    return a + b;
}
console.log(FNC_MY_SUM(1, 3));

// let은 재할당 가능
let FNC_MY_SUM_3 = function (a, b) {
    return a + b;
}
FNC_MY_SUM_3 = function (a, b) {
    return a * b;
}
console.log(FNC_MY_SUM_3(3, 3));

// 화살표 함수
const FNC_MY_SUM_2 = (a, b) => a + b;
console.log(FNC_MY_SUM_2(2, 4)); 

// const FNC_TEST1 = function() {
//     return 'FNC_TEST1';
// }
// 화살표 함수로 변경
const FNC_TEST1 = () => 'FNC_TEST1';
console.log(FNC_TEST1());

// 파라미터가 1개일 경우 소괄호 생략 가능
// const FNC_TEST2 = function(str) {
//     return str;
// }
const FNC_TEST2 = str => str;
console.log(FNC_TEST2('문자'));

// 리턴처리 이외의 처리가 있을 경우, {}생략 불가능
// const FNC_TEST3 = function(str) {
//     if(str === 'a') {
//         str = 'a 입니다.'
//     }
//     return str;
// }
const FNC_TEST3 = str => {
    if(str === 'a') {
        str = 'a 입니다.'
    }
    return str;
}
console.log(FNC_TEST3('a'));

// 콜백 함수
// 다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
const MY_SUB = (callBack, num) => {
    if(num === 3) {
        return '3입니다.';
    }
    return callBack() - num;
}
const MY_CALLBACK = () => 10;
console.log(MY_SUB(MY_CALLBACK, 2));

// callBack 함수에 식을 넣을 때
const MY_SUB_1 = (callBack, num) => {
    if(num === 3) {
        return '3입니다.';
    }
    return callBack(2, 5) - num;
}
const MY_CALLBACK_1 = (a, b) => a + b;
console.log(MY_SUB_1(MY_CALLBACK_1, 2));

// 즉시 실행 함수(IIFE)
// 함수의 정의와 동시에 바로 호출되는 함수
// 딱 한번만 호출되고 다시는 호출 불가
// 모듈화, 스코프 보호(캡슐화), 클로저 형성
const MY_CLASS = (function() {
    const NAME = '홍길동';
    return {
        myPrint: function() {
            console.log(NAME + '입니다.');
        }
    }
})();
MY_CLASS.myPrint();