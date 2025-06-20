// String 객체

let str = '문자열이지롱';
let str2 = new String('이렇게 만들어야해');
console.log(str, String(str2));

// length : 문자열의 길이를 반환
console.log(str.length, str2.length);

// charAt() : 특정 인덱스의 문자를 반환
console.log(str.charAt(3));

// indexOf() : 문자열에서 특정 문자열을 찾아 최소의 인덱스를 반환
// 찾지 못하면 -1 반환
str = '안녕하세요. 안녕하세요.';
console.log(str.indexOf('녕'));
console.log(str.indexOf('용'));
if(str.indexOf('효') < 0) {
    console.log('해당 문자열 없음');
} else {
    console.log('해당 문자열 있음')
}
// 검색을 시작할 인덱스 위치 지정하는 방법
console.log(str.indexOf('녕', 5));

// includes() : 문자열에서 특정 문자열을 찾아 true / false 반환
if(str.includes('하세요')){
    console.log('검색 문자열 존재');
} else {
    console.log('검색 문자열 존재 안함');
}

// replace() : 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
str = 'abcdefg dede';
console.log(str.replace('de', '안녕'));

// replaceAll() : 모든 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
console.log(str.replaceAll('de', '안녕'));

// substring() : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
str = '안녕하세요. JavaScript 입니다.'
console.log(str.substring(7, 17));

console.log(str.substring(str.indexOf('JavaScript'), str.indexOf('JavaScript') + 'JavaScript'.length));
// 위를 모듈화
let pattern = 'JavaScript';
let patternIndex = str.indexOf(pattern);
console.log(str.substring(patternIndex, patternIndex + pattern.length));

// split() : separator를 기준으로 문자열을 잘라서 배열 요소로 담은 배열을 반환
str = '빵, 돼지숯불, 제육, 돈까스';
console.log(str.split(', '));
console.log(str.split(', ', 2)); // 배열길이를 2로 제한

// trim() : 좌우 공백을 제거해서 문자열로 반환
str = '       asdfasdf        ';
console.log(str.trim());

// toUpperCase(), toLowerCase() : 알파벳을 대 / 소문자로 변환해서 반환
str = 'aBcDeFghIJ'
console.log(str.toLocaleLowerCase());
console.log(str.toUpperCase());