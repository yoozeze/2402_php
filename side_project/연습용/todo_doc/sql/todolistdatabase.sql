CREATE DATABASE todolist;
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
('20240301', 'day goals1','weekly goals2')
,('20240302', 'day goals1','weekly goals2')
,('20240303', 'day goals1','weekly goals2')
,('20240304', 'day goals1','weekly goals2')
,('20240305', 'day goals1','weekly goals2')
,('20240306', 'day goals1','weekly goals2')
,('20240307', 'day goals1','weekly goals2')
,('20240308', 'day goals1','weekly goals2')
,('20240309', 'day goals1','weekly goals2')
,('20240310', 'day goals1','weekly goals2')
,('20240311', 'day goals1','weekly goals2')
,('20240312', 'day goals1','weekly goals2')
,('20240313', 'day goals1','weekly goals2')
,('20240314', 'day goals1','weekly goals2')
,('20240315', 'day goals1','weekly goals2')
,('20240316', 'day goals1','weekly goals2')
,('20240317', 'day goals1','weekly goals2')
,('20240318', 'day goals1','weekly goals2')
,('20240319', 'day goals1','weekly goals2')
,('20240320', 'day goals1','weekly goals2')
,('20240321', 'day goals1','weekly goals2')
,('20240322', 'day goals1','weekly goals2')
,('20240323', 'day goals1','weekly goals2')
,('20240324', 'day goals1','weekly goals2')
,('20240325', 'day goals1','weekly goals2')
,('20240326', 'day goals1','weekly goals2')
,('20240327', 'day goals1','weekly goals2')
,('20240328', 'day goals1','weekly goals2')
,('20240329', 'day goals1','weekly goals2')
,('20240330', 'day goals1','weekly goals2')
,('20240331', 'day goals1','weekly goals2');

INSERT INTO tasks (todolist_no, content)
VALUES
('1', 'content2')
,('1', 'content3')
,('1', 'content4')
,('2', 'content1')
,('2', 'content2')
,('2', 'content3')
,('2', 'content4')
,('3', 'content1')
,('3', 'content2')
,('3', 'content3')
,('4', 'content1')
,('4', 'content2')
,('4', 'content3')
,('5', 'content1')
,('5', 'content2')
,('5', 'content3')
,('6', 'content1')
,('7', 'content1')
,('7', 'content2')
,('7', 'content3')
,('8', 'content1')
,('8', 'content2')
;

-- DROP DATABASE todolist;