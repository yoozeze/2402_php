-- 입사일이 1990/01/01 ~ 1995/12/31이고, 
-- 성별이 여자인 사원의 정보를 성과 이름 오름차순으로 정렬

SELECT *
FROM employees
WHERE (hire_date >= 19900101 
	AND hire_date <= 19951231)
	AND gender = "f"
ORDER BY first_name ASC, last_name ASC;

-- 1. 현재 재직중인 직원의 직책별 사원수 조회
SELECT 
	title
	,COUNT(title)
FROM titles
WHERE to_date >= DATE(NOW());

-- 2. 각 사원의 최고연봉 중 80000 이상을 조회
SELECT
	emp_no
	,MAX(salary)
FROM salaries
GROUP BY emp_no HAVING MAX(salary) >= 80000;

-- 3. 재직중인 사원 중 급여 상위 5위까지 조회
SELECT emp_no
FROM salaries
WHERE to_date >= DATE(NOW())
ORDER BY salary DESC
LIMIT 5;

-- 4. 자신의 사원 정보를 사원 테이블에 신입으로 저장 
INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)
VALUES(
	500000
	,'신입'
	,DATE(NOW())
	,DATE(NOW())
);

-- 5. 자신의 '신입'인 사원의 직책을 'staff'로 변경
UPDATE titles
	SET title = 'staff'
WHERE emp_no = 500000;

-- 1. 재직중인 여자 사원중 8월 생일인 사람의 사번 찾기
SELECT emp.emp_no
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= DATE(NOW())
		AND emp.gender = "F"
		AND MONTH(emp.birth_date) = 8;
		
SELECT emp.emp_no
    ,emp.gender
    ,emp.birth_date
FROM employees emp
    JOIN titles title
    ON emp.emp_no = title.emp_no
WHERE MONTH(emp.birth_date) = 8
    and to_date >= DATE(NOW())
    AND emp.gender = "F"
;

-- 2. 현재 재직중인 사원별 급여의 평균을 조회해 주세요.
SELECT 
	emp.emp_no
	, floor(AVG(sal.salary))
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND to_date >= DATE(NOW())
GROUP BY emp.emp_no;

-- 3. 현재 재직중인 사원별 급여의 평균이 30,000 ~ 50,000인, 사원번호와 평균급여를 조회해 주세요.
SELECT
	sal.emp_no
	, AVG(sal.salary)
FROM salaries sal
WHERE sal.to_date >= DATE(NOW())
GROUP BY sal.emp_no HAVING AVG(sal.salary) BETWEEN 30000 AND 50000;

-- 4. 현재 재직중인 사원별 급여 평균이 70,000이상인, 사원의 사번, 이름, 성, 성별을 조회해 주세요.
SELECT
	emp.emp_no
	,emp.first_name
	,emp.last_name
	,emp.gender
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= DATE(NOW())
GROUP BY emp.emp_no HAVING AVG(sal.salary) >= 70000;

-- 5. 현재 직책이 "Senior Engineer"인, 사원의 사원번호와 성을 조회해 주세요.
SELECT
	emp.emp_no
	,emp.last_name
FROM employees emp
	JOIN titles tit
		ON tit.emp_no = emp.emp_no
		AND tit.to_date >= DATE(NOW())
		AND tit.title = 'Senior Engineer';
		
-- 1. 현재 재직중인 사원 중 <직급이 "Senior Engineer"이고 급여가 50,000 이상>인 
-- 사원의 "사원번호", "이름", "입사일", "생일"을 구하시오.
SELECT
	emp.emp_no
	,CONCAT_WS(" ", last_name, first_name) full_name
	,emp.hire_date
	,emp.birth_date
FROM employees emp
	JOIN salaries sal
		ON sal.emp_no = emp.emp_no
	JOIN titles tit
		ON sal.emp_no = tit.emp_no
		AND tit.title = "Senior Engineer"
		AND sal.salary >= 60000
		AND sal.to_date >= DATE(NOW());

-- 2. 현재 재직중인 사원 중 <d001파트의 파트장>의 "직급","사원번호","이름","입사일,"을 구하시오.
SELECT
	tit.title
	,emp.emp_no
	,CONCAT_WS(" ", last_name, first_name) full_name
	,emp.hire_date
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
	JOIN dept_manager deptm
		ON emp.emp_no = deptm.emp_no
		AND deptm.to_date >= DATE(NOW())
		AND deptm.dept_no = "d001"
		AND tit.title = "Manager";
		
-- 3. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)
VALUES(
	500000
	,'s'
	,DATE(NOW())
	,DATE(99990101)
);


-- 4. 쿼리 실행 순서를 작성하세요.
-- FROM > WHERE > GROUP BY > HAVING > SELECT > ORDER BY > LIMIT

-- 5. 10481 사원의 풀네임 과거부터 현재까지 급여이력을 출력해주세요.
SELECT 
	CONCAT_WS(" ", last_name, first_name) full_name
	,sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND emp.emp_no = 10481;