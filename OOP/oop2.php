<?php
class Fish {
    protected $name;
    protected $residence;

    // 생성자
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    final public function breath() {
        echo $this->name."는 아가미 호흡을 합니다.\n";
    }

    public function swimming() {
        echo $this->name."가 ". $this->residence ."에서 헤엄을 칩니다.\n";
    }
}

class Saba extends Fish {
    // 생성자
    public function __construct() {
        parent::__construct("고등어", "바다");
    }
}

class FlyingFish extends Fish {
    // 생성자
    public function __construct() {
        parent::__construct("날치", "바다");
    }
    
    public function flying() {
        echo $this->name."가 날아갑니다.\n";
    }
}

$sabaInstance = new Saba();
$sabaInstance->breath();
$sabaInstance->swimming();

$flyingFishInstance = new FlyingFish();
$flyingFishInstance->breath();
$flyingFishInstance->swimming();
$flyingFishInstance->flying();