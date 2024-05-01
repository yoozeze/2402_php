CREATE DATABASE mini_multi_board;

USE mini_multi_board;

-- 1) users(유저) Table
-- 		- pk, 이메일, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE users (
	u_id				INT				PRIMARY KEY AUTO_INCREMENT
	,u_email			VARCHAR(50)		NOT NULL
	,u_pw				VARCHAR(256)	NOT NULL BINARY
	,u_name			VARCHAR(50)		NOT NULL
	,created_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME
);

-- 2) boards(게시판) table
-- 		-pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
CREATE TABLE boards (
	b_id				INT				PRIMARY KEY AUTO_INCREMENT
	,U_id				INT				NOT NULL
	,b_type			CHAR(1)			NOT NULL
	,b_title			VARCHAR(50)		NOT NULL
	,b_content		VARCHAR(1000)	NOT NULL
	,b_img			VARCHAR(256)
	,created_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME
);

-- 3) boardsname(게시판 기본 정보) table
-- 		-pk, 게시판타입, 게시판이름
CREATE TABLE boardsname (
	bn_id			INT				PRIMARY KEY AUTO_INCREMENT
	,b_type		CHAR(1)			NOT NULL UNIQUE
	,bn_name		VARCHAR(30)		NOT NULL
);

-- FK 추가
ALTER TABLE boards ADD CONSTRAINT fk_boards_u_id FOREIGN KEY (u_id) REFERENCES users(u_id);
ALTER TABLE boards ADD CONSTRAINT fk_boardsname_b_type FOREIGN KEY (b_type) REFERENCES boardsname(b_type);

-- 게시판 이름 테이블 정보 삽입
INSERT INTO boardsname ( b_type, bn_name )
VALUES ('0', '자유게시판')
,('1', '질문게시판');

-- test용 유저 정보 추가
INSERT INTO users ( u_email, u_pw, u_name )
VALUES ('admin@admin.com','qwer1234!','관리자');
