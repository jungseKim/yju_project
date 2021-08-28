메인 페이지 1번  
물건페이지 2번
카테고리? 페이지
물건 상세 페이지
채팅 페이지
마이 페이지 : {
	구매내역 페이지
	판매내역 페이지
	설정 페이지
	프로필 페이지
	}



메뉴바 : 로고, 검색기능, 로그인, 회원가입, 내정보, 카테고리, 채팅, 판매하기

user : id, email, password, 등급, 위치, 
물품 : id, name, price, user_id, 카테고리, img, 판매여부?
채팅 : id, 판매자id, 구매자id, 채팅,
댓글 : id, user_id,물품id, comment

연관테이블 : id, user_id,  덜 만든거 


-APP_KEY-

APP_KEY키를 생성하지 않고 로그인시 csrf 500에러가 발생한다
해결법은 해당 Laravel서버에서 APP_KEY를 받고 작업해야한다