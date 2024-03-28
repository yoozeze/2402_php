-- CREATE DATABASE todolist;
USE todolist;
CREATE TABLE todolist(
	NO  				INT 				PRIMARY KEY AUTO_INCREMENT
	,today 			DATE				NOT NULL
	,day_goals 		VARCHAR(100) 	NOT NULL
	,weekly_goals 	VARCHAR(100)	NOT NULL
	,notes 			VARCHAR(1000)	
	,created_at 	DATE				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE 
);
CREATE TABLE tasks(
	id 			INT 				PRIMARY KEY AUTO_INCREMENT
	,todolist_no INT				
	,content 	VARCHAR(300) 	NOT NULL
	,created_at DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at DATE 
	,FOREIGN KEY (todolist_no) REFERENCES todolist(NO)
);

INSERT INTO todolist (today, day_goals, weekly_goals)
VALUES
(DATE(NOW()), 'day goals1','weekly goals2')
,('20240327', 'day goals1','weekly goals2')
,('20240326', 'day goals1','weekly goals2')
,('20240325', 'day goals1','weekly goals2')
,('20240324', 'day goals1','weekly goals2');

INSERT INTO tasks (todolist_no, content)
VALUES
('1', 'content2')
,('1', 'content3')
,('1', 'content4')
,('2', 'content1')
,('2', 'content2')
,('2', 'content3')
,('2', 'content4');

DROP DATABASE todolist;