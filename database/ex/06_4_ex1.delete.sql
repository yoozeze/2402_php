-- DELETE 문 : 기존 데이터를 삭제하는 쿼리
-- DELETE FROM 테이블명
-- WHERE [조건]; 

-- 자신의 급여 정보 삭제
DELETE FROM salaries
WHERE emp_no = 500004
;
-- 나 자신의 직책 정보 삭제
DELETE FROM titles
WHERE emp_no = 500004
;
