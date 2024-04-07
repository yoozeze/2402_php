-- 1. 탈퇴한 회원의 정보를 출력해 주세요.
SELECT *
FROM users
WHERE deleted_at IS NOT NULL;

-- 답
SELECT *
FROM users
WHERE
	deleted_at IS NOT NULL;


-- 2. 삭제 되지 않은 게시글을 조회수가 높은 순서
-- (조회수가 같을 경우 작성일이 최신순으로)대로 출력해 주세요.
SELECT *
FROM boards
WHERE deleted_at IS NULL
ORDER BY views DESC, created_at DESC;

-- 답
SELECT *
FROM boards
WHERE delete_at IS NULL
ORDER BY views DESC, created_at DESC;


-- 3. 찜한 게시글이 3개 이상인 회원의 번호를 출력해 주세요.
SELECT 
	COUNT(wishlists.board_id)
	,wishlists.board_id
FROM wishlists
GROUP BY wishlists.user_id;

-- 답
SELECT
	user_id
FROM wishlists
GROUP BY user_id HAVING COUNT(*) >= 3;


-- 4. 이메일이 'test_35@green.com'인 회원이 
-- 작성한 게시글의 정보를 수정일자가 최신순으로 출력해 주세요.
SELECT *
FROM users
	JOIN boards
		ON users.id = boards.user_id
		AND users.email = 'test_35@green.com'
ORDER BY boards.updated_at DESC;

-- 답
SELECT
	boards.*
FROM boards
	JOIN users
		ON boards.user_id = users.id
		AND users.email = 'test_35@green.com'
ORDER BY boards.updated_at DESC;


-- 5. 탈퇴한 회원이 작성했던 게시글의 pk를 출력해 주세요.
SELECT users.id
FROM users
WHERE users.deleted_at IS NOT NULL;
-- 문제 이해 잘못함
-- 답
SELECT
	boards.id
FROM boards
	JOIN users
		ON boards.user_id = users.id
		AND users.deleted_at IS NOT NULL;
		

-- 6. 이름이 '사람_173'이 작성한 게시글과 찜목록을 모두 삭제처리 해주세요.
UPDATE boards
INNER JOIN users
	ON users.id = boards.user_id
INNER JOIN wishlists
	ON boards.user_id = wishlists.user_id
SET 
	boards.deleted_at = DATE(NOW())
	,wishlists.deleted_at = DATE(NOW())
WHERE users.name = '사람_173';

-- 확인용
SELECT *
FROM users
	JOIN boards
		ON users.id = boards.user_id
	JOIN wishlists
		ON boards.user_id = wishlists.user_id
		AND users.name = '사람_173';

-- 답(현업에서는 오류방지를 위해 쿼리 하나씩 실행시킴)
UPDATE boards
SET
	deleted_at = DATE(NOW())
WHERE user_id IN(SELECT id FROM users WHERE name = '사람_173')
;
UPDATE wishlists
SET
	deleted_at = DATE(NOW())
WHERE user_id IN(SELECT id FROM users WHERE name = '사람_173')
;


-- 7. 탈퇴한 회원이 작성했던 게시글을 모두 삭제처리 해주세요.
-- 실패 
UPDATE boards
SET boards.deleted_at = DATE(NOW())
	(SELECT created_at
	FROM users
		INNER JOIN boards
			ON users.id = boards.user_id
	)
WHERE users.deleted_at IS NOT NULL
;
-- 다시함
UPDATE boards
INNER JOIN users
	ON users.id = boards.user_id
SET boards.deleted_at = DATE(NOW())
WHERE users.deleted_at IS NOT NULL;

-- 확인용
SELECT 
	boards.deleted_at
	,boards.user_id
FROM boards
WHERE boards.deleted_at = DATE(NOW());


-- 답
UPDATE boards
SET 
	deleted_at = DATE(NOW())
WHERE user_id IN (SELECT id FROM users WHERE deleted_at IS NOT NULL)
;


-- 8. 가입일이 2020년 이후인 회원이 찜한 게시글의 제목과 내용을 출력해 주세요.
SELECT 
	boards.title
	,boards.content
	,users.created_at
FROM users
	JOIN wishlists
		ON users.id = wishlists.user_id
	JOIN boards
		ON wishlists.user_id = boards.user_id
		AND users.created_at >= 20200101;
		AND 

-- 답
SELECT DISTINCT
	boards.title
	,boards.content
FROM users
	JOIN wishlists
		ON users.id = wishlists.user_id
		AND users.created_at >= 20200101000000
	JOIN boards
		ON wishlists.board_id = boards.id
;