// Date 객체

// 앞에 0을 추가해주는 함수
const LPADZERO = (val, length) => {
    return String(val).padStart(length, '0')
}

// padStart : 첫 글자에 추가
// padEnd : 마지막 글자에 추가

// function LPADZERO(val, length) {
//     return String(val).padStart(length, '0');
// }

// 현재 날짜/시간 획득
const NOW = new Date();
console.log(NOW);

// getFullYear() : 연도만 가져오는 메소드 (yyyy)
const YEAR = NOW.getFullYear();
console.log(YEAR);

// getMonth() : 월만 가져오는 메소드, 0(1월) ~ 11(12월)을 획득
const MONTH = LPADZERO(NOW.getMonth() + 1, 2);
console.log(MONTH);

// getDate() : 일을 가져오는 메소드
const DATE =  LPADZERO(NOW.getDate(), 2);
console.log(DATE);

// getHours() : 시를 가져오는 메소드
const HOUR = LPADZERO(NOW.getHours(), 2);
console.log(HOUR);

// getMinutes() : 분을 가져오는 메소드
const MINUTE = LPADZERO(NOW.getMinutes(), 2);
console.log(MINUTE);

// getSeconds() : 초를 가져오는 메소드
const SECOND = LPADZERO(NOW.getSeconds(), 2);
console.log(SECOND);

// getMilliseconds() : 밀리초를 가져오는 메소드
const MILLISECONDS = LPADZERO(NOW.getMilliseconds(), 3);
console.log(MILLISECONDS);


// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토) 반환
const DAY = NOW.getDay()
console.log(DAY);

// 요일 한글로 변환 함수
const CHANGE_DAY_TO_KOREAN_DAY = num => {
    switch(num) {
        case 0:
            return '일요일';
        case 1:
            return '월요일';
        case 2:
            return '화요일';
        case 3:
            return '수요일';
        case 4:
            return '목요일';
        case 5:
            return '금요일';
        case 6:
            return '토요일';
    }
}
const KOREANDAY = CHANGE_DAY_TO_KOREAN_DAY(DAY);

// 날짜 포맷
const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${CHANGE_DAY_TO_KOREAN_DAY(DAY)} ${HOUR}:${MINUTE}:${SECOND}:${MILLISECONDS}`
console.log(FOMAT_DATE);
console.log(YEAR +'년 '+ MONTH +'월 '+ DATE +'일 '+ KOREANDAY +' ' + HOUR +'시 '+ MINUTE +'분 '+ SECOND +'초');

// getTime() : UNIX 타임스탬프를 반환
const TIME = NOW.getTime();
console.log(TIME) 

// 일수 차이
// 일 단위 -> 1000*60*60*24 = 86400000
// 주 단위 -> 1000*60*60*24*7 = 18144000000
// 월 단위 -> 1000*60*60*24*30.42 = 2628288000
// 년 단위 -> 1000*60*60*24*365 = 31536000000


const TARGET_DATE = new Date('2023-04-23 00:00:00');

const DIFF_DATE = Math.floor(Math.abs((TARGET_DATE - NOW) / 31536000000));
console.log(DIFF_DATE);

// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇 개월 후 입니까?
// 방법1
const TIME1 = new Date('2024-01-01 13:00:00');
const TIME2 = new Date('2025-05-30 00:00:00');

const DIFF_DATE1 = Math.floor(Math.abs(TIME2-TIME1) / 2628288000);
console.log(DIFF_DATE1);

// 방법2
const TARGET_DATE1 = new Date(2024, 0, 1, 13);
const TARGET_DATE2 = new Date('2025-05-30 00:00:00');
const DIFF_DATE2 = Math.floor(Math.abs(TARGET_DATE1 - TARGET_DATE2) / (1000*60*60*24*30));
console.log(DIFF_DATE2);