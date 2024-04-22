// 배열
const ARR = [1, 2, 3, 4, 5];
console.log(ARR[2]);

// 배열 추가
ARR[5] = 6;
console.log(ARR);

// 배열의 길이 획득
console.log(ARR.length);
ARR[ARR.length] = 7;
console.log(ARR);

// 배열 여부 체크
console.log(Array.isArray(ARR));
console.log(Array.isArray(1));

// indexOf() : 배열에서 특정 요소를 검색해 해당 인덱스를 획득
let arr = ['홍길동', '갑순이', '갑돌이'];
console.log(arr.indexOf('갑돌이'));
console.log(arr.indexOf('갑순이'));
console.log(arr.indexOf('홍길동'));
console.log(arr.indexOf('a'));
if(arr.indexOf('갑돌이')< 0){
    // 요소가 없을 때 처리
}

// includes() : 배열에서 특정 요소의 존재 여부를 체크, 리턴 boolean
console.log(arr.includes('홍길동'));
console.log(arr.includes('A'));
if(!(arr.includes('홍길동'))){
}

// 배열 복사
arr = ['홍길동', '갑순이', '갑돌이'];
arr2 = [...arr]; // Spread Operator : 원본을 복사해서 새로운 배열 만들어줌
arr2.push('반장님');
console.log(arr);
console.log(arr2);

// 복사한 배열에 값 추가
arr2.push('dd')
console.log(arr);
console.log(arr2);

// push() : 원본 배열의 마지막 요소를 추가, 리턴은 변경된 length, 여러개 값을 넣을때 유리
// push() 보다 arr[arr.length] 속도가 더 빠름
arr = ['홍길동', '갑순이', '갑돌이'];
let len = arr.push('반장님');
console.log(len);
arr.push('나미리', '둘리'); // 파라미터를 복수 설정해서 여러 값을 한번에 추가하기 쉬움

// pop() : 원본 배열의 마지막 요소를 제거, 제거된 요소의 값 반환
arr = ['홍길동', '갑순이', '갑돌이'];
let result = arr.pop();
console.log(arr);
console.log(result);

// unshift() : 원본 배열의 첫번째 요소를 추가, 변경된 length 반환, index(방 번호)도 모두 바뀜
arr = ['홍길동', '갑순이', '갑돌이'];
result = arr.unshift('둘리');
console.log(result, arr);

// shift() : 원본 배열의 첫번째 요소를 제거, 제거된 요소의 값 반환
result = arr.shift();
console.log(result, arr);

// splice(start, count, ...args) : 요소를 잘라서 자른 배열을 반환
arr = [1, 2, 3, 4, 5];
result = arr.splice(2)
console.log(arr); // 원본
console.log(result); // 잘린 값

arr = [1, 2, 3, 4, 5];
result = arr.splice(-2)
console.log(arr); // 원본
console.log(result); // 잘린 값

// 특정위치 값 자르기
arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2);
console.log(arr);
console.log(result);

// 특정위치 값 자르고 값 넣기
arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100, 200, 300);
console.log(arr);
console.log(result);

// 특정위치에 값 추가
arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 0, 100, 200, 300);
console.log(arr);
console.log(result);

// join() : 배열의 요소를 구분자로 연결한 문자열을 만들어서 반환
// 구분문자는 디폴트가 ','
arr = [1, 2, 3, 4];
result = arr.join('');
console.log(result);

// sort() : 배열의 요소를 문자열로 변환 후 오름차순 정렬 하고, 정렬된 배열을 반환
// 원본 변경
arr = [4, 3, 6, 20, 1, 2, 5, 10];
result = arr.sort();
console.log(arr);
console.log(result);

// 숫자 오름차순
arr = [4, 3, 6, 20, 1, 2, 5, 10];
result = arr.sort((a, b) => a - b);
// a - b의 값이 양수일 경우 자리 변경, a - b 값이 음수일 경우 그대로, a - b 갑이 0일 경우 같은 값으로 인식
// 콜백 함수일 경우 화살표 함수 이용
result = arr.sort((a, b) => a - b);
console.log(arr);
console.log(result);

// 숫자 내림차순
arr = [4, 3, 6, 20, 1, 2, 5, 10];
result = arr.sort((a, b) => b - a);
console.log(arr);
console.log(result);

// map() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새로운 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소의 값 * 2를 한 결과를 얻고 싶다.
let copyArr= [];
for(let val of arr) {
    copyArr[copyArr.length] = val * 2;
}
console.log(copyArr);

// map 이용
let mapArr = arr.map(val => val * 2);
console.log(mapArr);

// some() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행하고,
// 조건에 만족하는 결과가 하나라도 있으면 true, 만족하는 결과가 하나도 없으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result =  arr.some(val => val === 5);
console.log(result);
result =  arr.some(val => val === 11);
console.log(result);

// every() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행하고,
// 모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.every(val => val === 5);
console.log(result);
result = arr.every(val => val === 11);
console.log(result);
result = arr.every(val => val >= 1);
console.log(result);

// filter() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고, 
// 조건에 맞는 요소만 모아서 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.filter(val => val % 3 === 0);
console.log(result);

// forEach() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
arr.forEach((val, key) => console.log(`key : ${key}, val : ${val}`))