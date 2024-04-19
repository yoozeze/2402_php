console.log("js파일에서 안녕하세요.")

// 변수
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
var num1 = 1; // 최초선언
var num1 = 2; // 중복선언 
num1 = 3; // 재할당

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let num2 = 2;
// let num2 = 3;
num2 = 5; // 재할당

// 상수
// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const NUM = 3;
// const NUM = 5;
// NUM = 4;

// ----------------------------------------------------
// 스코프
// 변수나 함수가 유효한 범위
// 전역, 지역, 블록 3가지의 스코프

// 전역 스코프 : 모든 지역에서 접근 가능
let globalScope = '전역 스코프';

function myPrint() {
    console.log(globalScope);
}

myPrint();
console.log(globalScope);

// 지역 스코프
function myLocalPrint() {
    let localStr = '지역 스코프 let';
    console.log(localStr);
}
// console.log(localStr);

// 블록 레벨 스코프
// {   } 로 둘러싸인 범위
function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);
}
// myBlock();

function mytest() {
    if(true) {
        if(true) {
            let test02 = 'test02';
            console.log(test02);
        }
        let test01 = 'test01';
        console.log(test01);
        console.log(test02);
    }
}
// mytest();

// 호이스팅 hoisting
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것

// var 호이스팅 문제
console.log(test);
test = "aaa";
console.log(test);
var test;

// 데이터 타입
// number 숫자
let num = 1;
console.log(typeof num);

// string 문자열
let str = 'abcde';
console.log(typeof str);

// boolean 논리(ture / false)
let boo = true;
console.log(typeof boo);

// null 존재하지 않는 값
let letNull = null;
console.log(typeof letNull);

// undefined 값이 할당 되어 있지 않은 상태
let letUndefined;
console.log(typeof letUndefined);

// object 객체
let obj = {
    key1: 'val1'
    ,key2: 'val2'
};
console.log(typeof obj);

// Array 배열
let arr = [1, 2, 3];
console.log(typeof arr);

// symbol 심볼 : 동명이인
let letStr1 = '심볼1';
let letStr2 = '심볼2';
let letSymbol1 = Symbol('심볼1');
let letSymbol2 = Symbol('심볼1');
console.log(typeof letSymbol1);
console.log(typeof letSymbol2);
console.log(letSymbol1 === letSymbol2);
