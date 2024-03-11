-- INDEX
-- INDEX 확인
SHOW INDEX FROM employees;

SELECT *
FROM employees
WHERE first_name = 'saniya';

-- INDEX 생성
ALTER TABLE employees ADD INDEX idx_employees_first_name (first_name);

-- INDEX 삭제 
DROP INDEX idx_employees_first_name ON employees;


