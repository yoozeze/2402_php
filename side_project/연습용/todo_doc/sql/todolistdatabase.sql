CREATE DATABASE todolist;
USE todolist;
CREATE TABLE todolist(
	NO  				INT 				PRIMARY KEY AUTO_INCREMENT
	,today 			DATE				NOT NULL
	,day_goals 		VARCHAR(100) 	NOT NULL
	,todo1			VARCHAR(100)	NOT NULL 
	,todo2			VARCHAR(100)
	,todo3			VARCHAR(100)	
	,todo4			VARCHAR(100)	
	,created_at 	DATE				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE 
);

INSERT INTO todolist (today, day_goals, todo1)
VALUES
('20240301', 'day goals1','todo1')
,('20240302', 'day goals1','todo1')
,('20240303', 'day goals1','todo1')
,('20240304', 'day goals1','todo1')
,('20240305', 'day goals1','todo1')
,('20240306', 'day goals1','todo1')
,('20240307', 'day goals1','todo1')
,('20240308', 'day goals1','todo1')
,('20240309', 'day goals1','todo1')
,('20240310', 'day goals1','todo1')
,('20240311', 'day goals1','todo1')
,('20240312', 'day goals1','todo1')
,('20240313', 'day goals1','todo1')
,('20240314', 'day goals1','todo1')
,('20240315', 'day goals1','todo1')
,('20240316', 'day goals1','todo1')
,('20240317', 'day goals1','todo1')
,('20240318', 'day goals1','todo1')
,('20240319', 'day goals1','todo1')
,('20240320', 'day goals1','todo1')
,('20240321', 'day goals1','todo1')
,('20240322', 'day goals1','todo1')
,('20240323', 'day goals1','todo1')
,('20240324', 'day goals1','todo1')
,('20240325', 'day goals1','todo1')
,('20240326', 'day goals1','todo1')
,('20240327', 'day goals1','todo1')
,('20240328', 'day goals1','todo1')
,('20240329', 'day goals1','todo1')
,('20240330', 'day goals1','todo1')
,('20240331', 'day goals1','todo1');


-- DROP DATABASE todolist;
