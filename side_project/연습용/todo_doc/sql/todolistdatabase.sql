CREATE DATABASE todolist;
USE todolist;
CREATE TABLE todolist(
	NO  				INT 				PRIMARY KEY AUTO_INCREMENT
	,today 			DATE				NOT NULL
	,day_goals 		VARCHAR(100) 	NOT NULL
	,todo				VARCHAR(100)	NOT NULL
	,checked_com	CHAR(1)			NOT NULL
	,created_at 	DATE				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE 
);

INSERT INTO todolist (today, day_goals, todo, checked_com)
VALUES
('2024-03-01', '목표', '할일', '1')
,('2024-03-02', '목표', '할일', '1')
,('2024-03-03', '목표', '할일', '1')
,('2024-03-04', '목표', '할일', '0')
,('2024-03-05', '목표', '할일', '1')
,('2024-03-06', '목표', '할일', '1')
,('2024-03-07', '목표', '할일', '0')
,('2024-03-08', '목표', '할일', '1')
,('2024-03-09', '목표', '할일', '0')
,('2024-03-10', '목표', '할일', '0')
;


-- DROP DATABASE todolist;
