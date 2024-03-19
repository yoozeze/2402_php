<?php

// 상속 : 부모 클래스의 자원을 자식 클래스가 물려받아 사용하거나 재정의하는 것

class Parents {
    protected $name;

    public function __construct() {
        echo "부모 클래스 생성자 실행\n";
    }

    private function home() {
        echo "집은 부모님 겁니다.\n";
    }
    public function car() {
        echo "차는 부모님 자식 다 씁니다.\n";
    }
}
class Child extends Parents {

    public function __construct($name) {
        $this->name = $name;
        echo "자식 클래스 생성자 실행\n";
    }

    public function dog() {
        echo "강아지는 제겁니다.\n";
    }

    // 오버라이딩
    public function car() {
        echo "이 자동차는 이제 제겁니다.\n";
    }

    public function getName(){
        echo $this->name;
    }
}

$obj = new Child("홍길동");
$obj->car();
$obj->getName();
// $obj->home(); private이라서 부모만 쓸 수 있음
// 자식 construct가 없으면 부모의 construct가 실행됨