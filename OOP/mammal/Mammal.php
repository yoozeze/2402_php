<?php
namespace mammal;
// 포유류 클래스

abstract class Mammal {
    protected string $name; // 이름

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function printRegidence();
}