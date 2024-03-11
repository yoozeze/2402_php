-- 프로시저(procedure)
-- 전체실행해야 에러안뜸 (; 기준으로 실행되기때문)

-- 프로시저 정의
DELIMITER $$
CREATE PROCEDURE test()
BEGIN
	SELECT * FROM employees WHERE emp_no <= 10005;
END $$
DELIMITER ;

-- 프로시저 호출
CALL test();

-- 프로시저 삭제
DROP PROCEDURE test;