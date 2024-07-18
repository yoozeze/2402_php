<?php
class Mammal {
    protected $name;
    protected $residence;

    // 생성자
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    // final 자식쪽에서 변경하면 안되는 곳에 사용
    final public function breath() {
        echo $this->name."는 ". $this->residence ."에서 폐호흡을 합니다.";
    }
}

class Whale extends Mammal {
    public function __construct() {
        echo "고래 클래스 입니다.\n";
        parent::__construct("고래", "바다");
    }

    public function swimming() {
        echo $this->name."가 헤엄을 칩니다.";
    }

    // public function breath() {
    //     echo $this->name."는 폐호흡을 하고 ". $this->residence ."에서 숨을 잘 참습니다.";
    // }
}

class Flyingsquirrel extends Mammal {
    public function flying() {
        echo $this->name."가 날아갑니다.";
    }
}

$whaleInstance = new Whale();

$whaleInstance->breath();