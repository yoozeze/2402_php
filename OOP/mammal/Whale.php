<?php

namespace mammal;

require_once('./mammal/Mammal.php');
require_once('./Swim.php');

use inf\Swim;
use mammal\Mammal;

// 고래 클래스

class Whale extends Mammal implements Swim {
    public function printRegidence() {
        echo $this->name . '는 바다에 삽니다.';
    }

    public function swimming() {
        echo $this->name . '가 헤엄칩니다.';
    }
}