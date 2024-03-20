<?php

// namespace : 해당 파일의 주소를 할당
// 일반적으로 해당파일의 패스(경로)
namespace php\ex;

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