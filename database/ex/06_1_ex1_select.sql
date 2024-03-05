-- 테이블의 모든 데이터 조회 * (Asterisk)
SELECT *
FROM employees
;
-- 1. titles 테이블의 모든 데이터를 조회
SELECT *
FROM titles
;
-- 특정 컬럼만 조회
SELECT 
	emp_no
	,birth_date
FROM employees
;
-- titles 테이블에서 emp_no, title을 출력
SELECT
	emp_no
	,title
FROM titles
;
-- 특정 조건의 데이터만 조회 : WHERE 절
-- 비교연산자 : =, >=, <=, >, <
-- 사번이 10009인 사원의 모든 정보 조회
SELECT *
FROM employees
WHERE emp_no = 10009
;
-- 사원 이름이 'Mary'인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE first_name = 'Mary'
;
-- 생일이 1960/01/01 이상인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE birth_date >= 19600101
;
-- 입사일이 1990/12/25 이상인 사원의 사번, 이름, 성
SELECT 
	emp_no
	,first_name
	,last_name
FROM employees
WHERE hire_date >= 19901225
;
-- 복수의 조건을 적용시켜서 조회 : AND, OR 연산자
-- 사원번호가 10005 ~ 10009인 사원의 모든 정보 조회
SELECT *
FROM employees
WHERE
		emp_no >= 10005
	OR emp_no <= 10009
;
-- 사원의 이름이 Mary이고, 성이Piazza인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
		first_name = 'Mary'
	AND last_name = 'Piazza'
;
-- 이름이 Mary 또는 Moto이고, 성이 Piazza인 사원의 정보 조회
SELECT *
FROM employees
WHERE
	(	
		first_name = 'Mary'
		OR first_name = 'Moto'
	)
	AND LAST_name = 'Piazza'
;
-- BETWEEN 연산자 : 지정한 범위의 데이터를 조회
SELECT *
FROM employees
WHERE 
		emp_no >= 10005
	AND emp_no <= 10009
;
SELECT *
FROM employees
WHERE 
		emp_no 
	BETWEEN 10005 AND 10009
;
-- IN연산자 : 지정한 값과 일치한 데이터를 조회
-- 10005, 10007 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
	emp_no = 10005 
	or emp_no = 10007
;
SELECT *
FROM employees
WHERE
	emp_no IN(10005, 10007)
;
-- LIKE 절 : 문자열의 내용을 조회(대소문자 구분 X)
-- % : 글자수 상관없이 조회
-- 이름이 ge로 끝나는 데이터 조회
SELECT *
FROM employees
WHERE
	first_name LIKE('%ge')
;
-- 이름이 ge로 시작하는 데이터 조회
SELECT *
FROM employees
WHERE
	first_name LIKE('Ge%')
;
-- 이름에 ge가 포함되는 데이터 조회
SELECT *
FROM employees
WHERE
	first_name LIKE('%ge%')
;
-- 0.001초이하가 커트라인
-- _ : 언더바의 개수 만큼의 글자의 개수가 제한되서 조회
SELECT *
FROM employees
WHERE
	first_name LIKE('__Ge_')
;
-- ORDER BY 절 : 데이터를 정렬해서 조회
-- 생일 오름 차순
SELECT *
FROM employees
ORDER BY birth_date DESC, hire_date
;
-- 입사일이 1990/01/01 ~ 1995/12/31이고, 성별이 여자인 사원의 정보를 성과 이름 오름차순으로 정렬
SELECT *
FROM employees
WHERE
-- 	(hire_date BETWEEN 1990101 AND 19951231) AND gender = 'F'
	(	
		hire_date >= 19900101
		AND hire_date <= 19951231
	)
	AND gender = 'f'
ORDER BY last_name, first_name
;
-- DISTINCT 키워드 : 검색 결과에서 중복되는 레코드 없이 조회
SELECT DISTINCT emp_no
FROM salaries
WHERE
	emp_no = 10001
;
-- GROUP BY 절, HAVING 절 : 그룹으로 묶어서 조회
-- GROUP BY [그룹으로 묶을 컬럼] HAVING[그룹으로 묶을때의 조건(집계함수 조건, 필수 아님)]
SELECT
	gender
	,COUNT(gender) 
FROM employees
GROUP BY gender
;
-- 현재 재직중인 직원의 직책별 사원수 조회
SELECT
	title
	,COUNT(title)
FROM titles
WHERE to_date >= 20240305
GROUP BY title HAVING title LIKE('%engineer%')
;
-- 각 사원의 최고연봉을 조회
SELECT
	emp_no
	,MAX(salary)
FROM salaries
GROUP BY emp_no
;
-- 각 사원의 최고연봉 중 8000 이상을 조회
SELECT
	emp_no
	,MAX(salary)
FROM salaries
GROUP BY emp_no HAVING MAX(salary) >= 80000 
;
-- AS : 컬럼에 별칭 부여, 생략가능
SELECT
	emp_no
	,MAX(salary) AS max_sal
FROM salaries
GROUP BY emp_no HAVING MAX(salary) >= 80000 
;
-- LIMIT, OFFSET : 출력하는 데이터의 개수 제한
SELECT *
FROM employees
LIMIT 5 OFFSET 10
;
-- OFFSET 키워드 생략가능
SELECT *
FROM employees
LIMIT 10, 5
;
-- 가장 높은 연봉을 받는 사원 조회
SELECT
	emp_no
	,MAX(salary) max_sal
FROM salaries
GROUP BY emp_no
ORDER BY max_sal DESC
LIMIT 1
;
-- 재직중인 사원 중 급여 상위 5위까지 조회
SELECT
	emp_no
	,MAX(salary) max_sal
FROM salaries
WHERE to_date >= 20240305
GROUP BY emp_no
ORDER BY max_sal DESC
LIMIT 5
;
SELECT
	emp_no
	,salary
FROM salaries
WHERE to_date >= 20240305
ORDER BY salary DESC
LIMIT 5
;
