// Promise 객체
// JS의 비동기 프로그래밍에서 근간이 되는 기법
// 콜백 지옥을 개선하기 위해서 등장한 기법

// 콜백 지옥
// setTimeout(()=>{
//     console.log('A');
//     setTimeout(()=>{
//         console.log('B');
//         setTimeout(()=>{
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// Pomise 객체 생성
const PRO = (str, ms) => {
	return new Promise((resolve, reject) => { // resolve는 무조건 있어야 함
		setTimeout(()=>{
            if(str === 'A') {
                resolve('성공 : A임'); // 작업 성공 resolve() 호출
            } else {
                reject('실패 : A아님'); // 작업 실패 reject() 호출
            }
		}, ms);
	});
}

// Promise 호출
// PRO('B', 5000)
// .then(result => console.log('then : ' + result)) // resolv가 호출됐을 때
// .catch(err => console.log('catch : ' + err)) // reject가 호출됐을 때

// 콜백 지옥
// setTimeout(()=>{
//     console.log('A');
//     setTimeout(()=>{
//         console.log('B');
//         setTimeout(()=>{
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// 위에 콜백 지옥 개선
const PRO2 = (str, ms) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str)
            resolve();
        }, ms);
    });
}

PRO2('A', 3000)
.then(() => PRO2('B', 2000))
.then(() => PRO2('C', 1000))
.catch(() => console.log('ERROR'))
.finally(() => console.log('FINALLY'));

// 병렬 처리 방법 (Promise.all())
// 동시에 처리
const MYLOOP = cnt => {
    for(let i = 0; i < cnt; i++) {

    }
    console.log('myloop 종료 : ' + cnt);
}

MYLOOP(100000000); // 10초
MYLOOP(10000000); // 5초
MYLOOP(1000000); // 1초 걸린다고 가정했을때 총 걸린 시간은 10초

Promise.all([MYLOOP(100000000), MYLOOP(10000000), MYLOOP(1000000)]);