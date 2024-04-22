// 조건문 ( if, switch )

// if (조건) {
    // 처리
// } else if (조건){
    // 처리
// } else {
    // 처리
// }

// 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력
let num = 2;

if(num === 1){
    console.log("1등");
} else if ( num === 2) {
    console.log("2등");
} else if ( num === 3) {
    console.log("3등");
} else if ( num === 5) {
    console.log("특별상");
} else {
    console.log("순위 외");
}

if(num <= 3){
    console.log(num + "등");
} else if ( num === 5){
    console.log("특별상");
} else {
    console.log("순위 외");
}

// switch(검증 대상) {
	// case 일치 검증 값:
		// break;
	// case 일치 검증 값:
		// break;
	// 상위 case문에서 일치 검증 값이 없을 경우 실행
	// default:
		// 실행할 처리
		// break;
// }

// 나이가 20이면 '20대', 30이면 '30대', 나머지는 '모르겠다.'

let age = 20;

switch(age) {
    case 20:
        console.log('20대');
        break;
    case 30:
        console.log('30대');
        break;
    default:
        console.log('모르겠다');
        break;
}

// 반복문 ( for, while, do_while )

// for 반복문
for(let i = 1; i < 5; i *= 2){
    console.log(i + '번째 루프');
}

for(let i = 1; i < 11; i++){
    if (i % 3 === 0) {
        continue;
    }
    console.log(i + '번째 루프');

    if (i === 7) {
        break;
    }
}

// while

let cnt = 1;
while(cnt <= 10){
    console.log(cnt + '번째 루프');
    cnt++;
}

let cnt1 = 1;
while(cnt1 <= 10){
    if(cnt1 % 3 === 0) {
        cnt1++;
        continue;
    }
    console.log(cnt1 + '번째 루프1');
    cnt1++;
}

let cnt2 = 1;
while(cnt2 <= 10){
    if(cnt2 % 3 === 0) {
        cnt2++;
        continue;
    }
    console.log(cnt2 + '번째 루프2');

    if(cnt2 === 7) {
        break;
    }
    cnt2++;
}

// 구구단 2~9단 출력

for(let dan = 2; dan < 10; dan++) {
    console.log('** ' + dan + '단' + ' **');
    for(let num1 = 1; num1 < 10; num1++) {
        let a = dan * num1;
        console.log(dan + 'X' + num1 + '=' + a);
    }
}

// 19단
for(let dan1 = 2; dan1 < 20; dan1++) {
    console.log('** ' + dan1 + '단' + ' **');
    for(let num2 = 1; num2 < 20; num2++) {
        let a2 = dan1 * num2;
        console.log(dan1 + 'X' + num2 + '=' + a2);
    }
}

const DAN = 9;
for(let dan = 2; dan <= DAN; dan++) {
    console.log(`**${dan}단**`);
    for(let multi = 1; multi <= DAN; multi++) {
        let a1 = dan * multi
        console.log(`${dan} X ${multi} = ${a1}`)
    }
}

// for...in
// 모든 객체를 반복하는 문법
// key에만 접근이 가능
const OBJ = {
    key1: 'val1'
    ,key2: 'val2'
};

console.log(OBJ);
console.log(OBJ.key1);
console.log(OBJ.key2);

// key 값 가져오기
for(let key in OBJ) {
    console.log(key);
}
// val 값 가져오기
for(let key in OBJ) {
    console.log(OBJ[key]);
}

const ARR1 = [1, 2, 3];

console.log(ARR1);

for(let key in ARR1) {
    console.log('key = ' + key);
}
for(let key in ARR1) {
    console.log('val = ' + ARR1[key]);
}

// for...of
// iterable(순서가 정해져 있는) 객체를 반복하는 문법 (String, Array, Map, Set, TypeArray..)
// iterable 확인법 > length로 확인 가능
// value에만 접근 가능
const STR1 = '안녕하세요';
for(let val of STR1) {
    console.log(val);
}