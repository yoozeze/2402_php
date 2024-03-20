<?php

// class : 동종의 객체들을 모아 정의
// 관습적으로 파일명과 클래스명을 동일하게 지어줌
// class 클라스명 { 멤버 필드 영역 }
class Whale {
    // 1. 프로퍼티
    // 접근 제어 지시자
    // public  : class 외부, 내부 어디에서나 접근 가능 
    public $str;

    // private : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i;

    // protected : class 내부에서만 접근 가능, 외부에서는 접근 불가능, 단, 상속관계에서는 접근 가능
    protected $boo;
    
    // ----

    private $name; // $this->name

    // 생성자 메소드 construct
    public function __construct($name) {
        $this->name = $name;
    }

    // getter / setter : private 이나 protected로 설정된 프로퍼티에 접근을 위해 사용하는 메소드
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    // 2. 메소드
    public function swim($opt){
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }

    public function breathe(){
        echo $this->name." 호흡 한다.\n";
    }

    // 3. static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    // static으로 정의하면 메모리에 바로 올라감
    public static function big(){
        echo "매우 크다.";
    }

}

// 클래스 인스턴스 생성
$objWhale = new Whale("고래");
$objWhale->swim("흰 수염 ");
echo $objWhale->getName()."\n";
$objWhale->breathe();

$objWhale->setName("참새");
$objWhale->swim("흰 수염 ");
$objWhale->breathe();

// static 메소드 호출
Whale::big();

echo "\n";

// Shark 클래스를 만들어주세요.
// 프로퍼티 : private $name
// 메소드 : public swim, public breathe

class Shark {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function swim($opt){
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }
    
    public function breathe(){
        echo $this->name." 호흡 한다.\n";
    }
}
$objShark = new Shark("상어");
$objShark->swim("백상아리 ");
$i = 0;

while($i < 5) {
    $objShark->breathe();
    $i++;
}

