<?php

class Whale {
    
    public $str;
    private $i;
    protected $boo;
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function swim($opt){
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }

    public function breathe(){
        echo $this->name." 호흡 한다.\n";
    }
    public static function big(){
        echo "매우 크다.";
    }

}
