-- 뷰(VIEW)
-- 가상 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해서 사용
-- (원본은 암호화 권한이 주어진 사람만 내용 확인 가능 뷰만들때 암호화 풀어서 만듦)
-- 장점: 복잡한 SQL를 편하게 조회 가능
-- 단점: INDEX를 사용할 수 없어 조회 속도 느림
-- 사원의 사번, 생년월일, 이름, 성, 성별, 입사일, 현재급여, 현재직책 출력
SELECT
	emp.emp_no
	,emp.birth_date
	,emp.first_name
	,emp.last_name
	,emp.gender
	,emp.hire_date
	,sal.salary
	,tit.title
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
;

-- 위 쿼리를 뷰로 작성
CREATE VIEW view_emp_info
AS 
	SELECT
		emp.emp_no
		,emp.birth_date
		,emp.first_name
		,emp.last_name
		,emp.gender
		,emp.hire_date
		,sal.salary
		,tit.title
	FROM employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date >= NOW()
		JOIN titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW()
;

SELECT *
FROM view_emp_info;









