-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19940402
	,'yoo'
	,'hogyeong'
	,'F'
	,20240311
);
	-- 답
	INSERT INTO employees (
		emp_no ,birth_date ,first_name ,last_name ,gender ,hire_date)
	VALUES (
		500000, 19940402, 'yoo', 'hogyeong', 'F', DATE(NOW()));

-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO salaries (
	emp_no 
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,500000
	,DATE(NOW())
	,DATE(99990101)
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d001'
	,DATE(NOW())
	,DATE(99990101)
);

	-- 답
	INSERT INTO salaries (emp_no, salary, from_date, to_date)
	VALUES(500000, 30000, DATE(NOW()), 99990101);
	
	INSERT INTO titles (emp_no, title, from_date, to_date)
	VALUES(500000, 'staff', DATE(NOW()), 99990101);
	
	INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
	VALUES(500000, 'd001', DATE(NOW()), 99990101);

-- 3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19980101
	,'no'
	,'gyeongho'
	,'M'
	,20240311
);
INSERT INTO salaries (
	emp_no 
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,500000
	,DATE(NOW())
	,DATE(99990101)
);
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d001'
	,DATE(NOW())
	,DATE(99990101)
);
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,20020101
	,'Lee'
	,'nara'
	,'F'
	,20240311
);
INSERT INTO salaries (
	emp_no 
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,500000
	,DATE(NOW())
	,DATE(99990101)
);
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d001'
	,DATE(NOW())
	,DATE(99990101)
);

	-- 답
	INSERT INTO employees (emp_no ,birth_date ,first_name ,last_name ,gender ,hire_date)
	VALUES (500001, 19950402, 'hong', 'gildong', 'M', DATE(NOW()))
			,(500002, 19960402, 'Lee', 'mina', 'F', DATE(NOW()));
	
	INSERT INTO salaries (emp_no, salary, from_date, to_date)
	VALUES(500001, 30001, DATE(NOW()), 99990101)
			,(500002, 30002, DATE(NOW()), 99990101);
	
	INSERT INTO titles (emp_no, title, from_date, to_date)
	VALUES(500001, 'staff', DATE(NOW()), 99990101)
			,(500002, 'staff', DATE(NOW()), 99990101);
	
	INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
	VALUES(500001, 'd001', DATE(NOW()), 99990101)
			,(500002, 'd001', DATE(NOW()), 99990101);

-- 4. 나와 짝꿍의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET
	dept_no = 'd009'
WHERE
	emp_no in(500000, 500001, 500002);
	
	-- 답
	UPDATE dept_emp
	SET to_date = DATE(NOW())
	WHERE emp_no IN (500000, 500001, 500002);
	
	INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
	VALUES (500000, 'd009', DATE(NOW()), 99990101)
			,(500001, 'd009', DATE(NOW()), 99990101)
			,(500002, 'd009', DATE(NOW()), 99990101)

-- 5. 짝꿍의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no IN (500001, 500002);

DELETE FROM titles
WHERE emp_no IN (500001, 500002);

DELETE FROM salaries
WHERE emp_no IN (500001, 500002);

	-- 답 (순서대로)
	DELETE FROM titles
	WHERE emp_no IN (500001, 500002);
	
	DELETE FROM salaries
	WHERE emp_no IN (500001, 500002); 
	
	DELETE FROM dept_emp
	WHERE emp_no IN (500001, 500002); 
	
	DELETE FROM employees
	WHERE emp_no IN (500001, 500002);  

-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
SET 
	to_date = NOW()
WHERE 
	emp_no = 111939;

INSERT INTO dept_manager (
	dept_no
	,emp_no
	,from_date
	,to_date
)
VALUES (
	'd009'
	,500000
	,DATE(NOW())
	,DATE(99990101)
);

	-- 답
	UPDATE dept_manager
	SET to_date = DATE(NOW())
	WHERE dept_no = 'd009'
		AND to_date > DATE(NOW());
	INSERT INTO dept_manager(dept_no, emp_no, from_date, to_date)
	VALUES('d009', 500000, DATE(NOW()), 99990101);
		
-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
);

UPDATE titles tit
SET 
	title = 'Senior Engineer'
WHERE 
	from_date = DATE(NOW());
	
	-- 답
	UPDATE titles
	SET to_date = DATE(NOW())
	WHERE emp_no = 500000;
	INSERT INTO titles(emp_no, title, from_date, to_date)
	VALUES(500000, 'Senior Engineer', DATE(NOW()), 99990101);

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요

SELECT 
	emp.emp_no
	,CONCAT_WS(' ', emp.last_name, emp.first_name) full_name
	-- ,sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
WHERE sal.salary = 
	(SELECT MAX(salary) FROM salaries)
	OR sal.salary = (SELECT MIN(salary) FROM salaries);
	
	-- 답
	SELECT
		emp.emp_no
		,emp.first_name
	FROM employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date >= DATE(NOW())
	WHERE 
		sal.salary IN (
			(SELECT MAX(salary) FROM salaries WHERE to_date > DATE(NOW()))
			,(SELECT MIN(salary) FROM salaries WHERE to_date > DATE(NOW()))
		);
		
	SELECT
		emp.emp_no
		,emp.first_name
	FROM employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date >= DATE(NOW())
		JOIN (SELECT 
					MAX(salary) max_sal
					, MIN(salary) min_sal 
				FROM salaries 
				WHERE to_date > DATE(NOW())
				) minmax_sal
			ON sal.salary IN (minmax_sal.max_sal, minmax_sal.min_sal);

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT
	AVG(sal.salary)
FROM salaries sal
WHERE sal.to_date >= NOW();

	-- 답
	select
		AVG(sal.salary)
	FROM salaries sal
	WHERE sal.to_date > DATE(NOW());

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	AVG(sal.salary) avg_sal
FROM salaries sal
WHERE sal.emp_no IN (499975);

	-- 답
	SELECT
		AVG(sal.salary) avg_sal
	FROM salaries sal
	WHERE sal.emp_no = 499975;

-- 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요. (9점)
CREATE TABLE users (
	userid 		INT			PRIMARY KEY AUTO_INCREMENT
	,username 	VARCHAR(30) NOT NULL 
	,authflg 	CHAR(1) 		DEFAULT '0'
	,birthday 	DATE 			NOT NULL 
	,created_at DATETIME 	DEFAULT 'currentdate'
);

	-- 답
	CREATE TABLE users (
	userid 		INT 			PRIMARY KEY AUTO_INCREMENT
	,username  	VARCHAR(30) NOT NULL
	,authflg 	CHAR(1) 		DEFAULT'0'
	,birthday 	DATE 			NOT NULL 
	,created_at DATETIME 	DEFAULT CURRENT_TIMESTAMP()
	);
-- [01]에서 만든 테이블에 아래 데이터를 입력해 주세요.(12점)
-- 유저id : 자동증가
-- 유저 이름 : ‘그린’
-- AuthFlg : ‘0’
-- 생일 : 2024-01-26
-- 생성일 : 오늘 날짜 

INSERT INTO users (
	userid
	,authflg
	,birthday
	,created_at
)
VALUES (
	'그린'
	,'0'
	,DATE(20240126)
	,DATE(NOW())
);

	-- 답
	INSERT INTO users (username, authflg, birthday, created_at)
	VALUES ('그린', '0', 20240126, NOW());

-- [02]에서 만든 레코드를 아래 데이터로 갱신해 주세요.(12점)
-- 유저 이름 : ‘테스터’
-- AuthFlg : ‘1’
-- 생일 : 2007-03-01
UPDATE users
SET 
	userid = '테스터'
	,authflg = '1'
	,bithday = DATE(20070301)
WHERE 
	userid = '그린';
	
	-- 답
	UPDATE users
	SET
		username = '테스터'
		,authflg = '1'
		,birthday = 20070301
	WHERE userid = 1;
	
	
-- [02]에서 만든 레코드를 삭제해 주세요.(12점)
DELETE FROM users
WHERE userid = '그린';

	-- 답
	DELETE FROM users
	WHERE userid = 1;

-- [01]에서 만든 테이블에 아래 Column을 추가해 주세요.(9점) 
ALTER TABLE users ADD addr VARCHAR(100) NOT NULL DEFAULT '-';

	-- 답
	ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';
	
-- [01]에서 만든 테이블을 삭제해 주세요.(12점)
DROP TABLE users;

	-- 답
	DROP TABLE users;

-- 아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.(9점)
-- 조건1 : rankmanagement의 FK인 userid는 users의 userid를 참조 중
-- 조건2 : Table users
-- 조건3 : Table rankmanagement
SELECT
	users.username
	,users.bithday
	,rankmanagement.rankname
FROM users
	JOIN rankmanagement
		ON users.userid = rankmanagemet.userid;
		
	-- 답
	SELECT
		usr.username
		,usr.birthday
		,rmg.rankname
	FROM users usr
		JOIN rankmanagement rmg
			ON usr.userid = rmg.userid;
		
