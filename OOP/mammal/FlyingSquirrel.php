<?php

namespace mammal;

require_once('./mammal/Mammal.php');
use mammal\Mammal;

// 날다람쥐 클래스

class FlyingSquirrel extends Mammal {
    public function printRegidence() {
        echo $this->name . '는 산에 삽니다.';
    }

    public function flying() {
        echo $this->name . '가 날아갑니다.';
    }
}