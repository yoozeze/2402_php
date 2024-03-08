-- DB 생성
CREATE DATABASE test;

-- DB 선택
USE test;

-- TABLE 생성
-- 컬럼명- 데이터타입-제약조건
-- 회원 정보 테이블
CREATE TABLE users (
	user_ID 			INT 				PRIMARY KEY AUTO_INCREMENT
	,user_name 		VARCHAR(50) 	NOT NULL 
	,user_tel 		VARCHAR(20) 	NOT NULL COMMENT '- 제외 숫자'
	,user_addr 		VARCHAR(150) 	NOT NULL
	,user_birth_at DATE 				NOT NULL COMMENT 'YYYY-MM-DD'
	,user_gender 	CHAR(1) 			NOT NULL COMMENT '0 : 남자, 1 : 여자'
	,created_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at 	DATETIME 		NULL COMMENT 'YYYY-MM-DD hh:mi:ss'
);
-- 상품 목록 테이블
CREATE TABLE products (
	product_ID 		INT 				PRIMARY KEY AUTO_INCREMENT
	,product_name 	VARCHAR(200) 	NOT NULL 
	,product_price INT 				NOT NULL 
	,created_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,update_at 		DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at 	DATETIME 		NULL COMMENT 'YYYY-MM-DD hh:mi:ss'
);
-- 주문 테이블
CREATE TABLE orders (
	order_ID 		INT				PRIMARY KEY AUTO_INCREMENT
	,user_ID			INT				NOT NULL 
	,product_ID		INT				NOT NULL 
	,payment_type 	CHAR(1)			NOT NULL DEFAULT '0' COMMENT '0 : 결제전, 1 : 카드, 2 : 계좌이체'
);

-- ALTER TABLE : 테이블의 구조를 수정하는 SQL
-- FK 추가 -> ADD
ALTER TABLE orders ADD CONSTRAINT fk_orders_user_ID FOREIGN KEY (user_ID) REFERENCES users(user_ID);
ALTER TABLE orders ADD CONSTRAINT fk_orders_product_ID FOREIGN KEY (product_ID) REFERENCES products(product_ID);

-- users 테이블에 회원 ID가 추가 필요
ALTER TABLE users ADD COLUMN user_member_id VARCHAR(100) NOT NULL;
ALTER TABLE users ADD CONSTRAINT uk_users_user_member_id UNIQUE (user_member_id); 

--  UK 삭제 -> DROP
ALTER TABLE users DROP CONSTRAINT uk_users_user_member_id;

-- user_member_id 데이터타입 변경 -> MODIFY
ALTER TABLE users MODIFY COLUMN user_member_id VARCHAR(150) NOT NULL;
-- 크기를 늘리는것은 상관없지만, 줄이는것은 하지않는것이 좋음 기존데이터가 날라갈 수 있음

-- 테이블 삭제
DROP TABLE orders;
DROP TABLE users, products;

-- 데이터 베이스 삭제
DROP DATABASE test;

-- TRUNCATE TABLE : 데이블의 모든 데이터 삭제
TRUNCATE TABLE titles;

