-- UPDATE 문 : 기존 데이터를 수정하는 쿼리
-- UPDATE 테이블명
-- SET 
-- 	컬럼1 = 값1
-- 	,컬럼2 = 값2
-- 	...
-- WHERE [조건]
-- ;
-- 나의 직책 변경하기
UPDATE titles
SET
	title = '사장'
WHERE 
	emp_no = 500004
;
-- 직책이 '신입'인 사원의 직책을 'staff'로 변경
UPDATE titles
SET
	title = 'staff'
WHERE
	title = '신입'
;
-- SELECT로 UPDATE에 문제가 없는지 확인
SELECT *
FROM titles
WHERE 
	title ='신입'
;
-- 현재 급여가 40000 이하인 직원의 급여를 42000으로 변경
UPDATE salaries
SET
	salary = 42000
WHERE
	salary <= 40000 
	AND to_date >= NOW() 
;
SELECT *
FROM salaries 
WHERE 
	salary = 42000
;