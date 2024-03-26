-- 1.
CREATE DATABASE problem;
USE problem;
CREATE TABLE users(
	id 				INT 				PRIMARY KEY AUTO_INCREMENT
	,name 			VARCHAR(50)	 	NOT NULL
	,email 			VARCHAR(100) 	NOT NULL UNIQUE
	,created_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE 
);

CREATE TABLE boards(
	id 				INT 				PRIMARY KEY AUTO_INCREMENT
	,user_id			INT
	,title 			VARCHAR(100) 	NOT NULL 
	,content 		VARCHAR(1000) 	NOT NULL 
	,created_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE
	,FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE wishlists(
	id 				INT 				PRIMARY KEY AUTO_INCREMENT
	,user_id			INT
	,board_id		INT
	,created_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE() 
	,deleted_at 	DATE 
	,FOREIGN KEY (user_id) REFERENCES users(id)
	,FOREIGN KEY (board_id) REFERENCES boards(id)
);

-- 2.
ALTER TABLE boards ADD COLUMN views INT NOT NULL DEFAULT '0';

-- 3.
INSERT INTO users(name, email)
VALUES
('홍길동', '123@naver.com')
,('갑돌이', '456@naver.com')
,('갑순이', '789@naver.com');

-- 4.
INSERT INTO boards (user_id, title, content)
VALUES
('1', 'title1', 'content1')
,('1', 'title2', 'content2')
,('1', 'title3', 'content3')
,('1', 'title4', 'content4');

-- 5.

-- 6.
DELETE FROM users
WHERE name = '홍길동';
-- 7.
DROP TABLE wishlists;
-- 8. 
DROP DATABASE problem;
