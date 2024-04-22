// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
arr1 = [...ARR1];
result = arr1.sort((a, b) => a - b);
console.log(ARR1);
console.log(result);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];
// 짝수
resultEven = ARR2.filter(val => val % 2 === 0);
console.log(resultEven);
// 홀수
resultOdd = ARR2.filter(val => val % 2 !== 0);
console.log(resultOdd);
// 정렬
resultEven1 = resultEven.sort((a, b) => a - b);
console.log(resultEven1);
resultOdd1 = resultOdd.sort((a, b) => a - b);
console.log(resultOdd1);
