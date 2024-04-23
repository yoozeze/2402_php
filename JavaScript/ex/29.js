// Math 객체

// 올림, 반올림, 버림
Math.ceil(0.1); // 1 출력
Math.round(0.1); // 1 출력
Math.floor(0.9); // 0 출력

// 랜덤 값
Math.random(); // 0 ~ 1 랜덤한 수 반환
// 1 ~ 10 랜덤 숫자 획득 
console.log(Math.ceil(Math.random() * 10));

for(let i = 0; i < 20; i++) {
    console.log(Math.ceil(Math.random() * 10));
}

const ARR = [6, 3, 4, 65, 87, 8, 3, 2];
// 최솟값
let max = Math.max(...ARR);
console.log(max);

// 최댓값
let min = Math.min(...ARR);
console.log(min);

// 절댓값
let a = Math.abs(1);
let b = Math.abs(-1);
console.log(a, b);

