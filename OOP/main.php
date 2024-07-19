<?php

require_once('./mammal/Whale.php');
require_once('./mammal/FlyingSquirrel.php');
require_once('./fish/Saba.php');
require_once('./Swim.php');
require_once('./Breath.php');

use inf\Breath;
use mammal\FlyingSquirrel;
use mammal\Whale;
use fish\Saba;
use inf\Swim;

$whaleInstance = new Whale("고래");
$whaleInstance->swimming();

$flyingSquirrelInstance = new FlyingSquirrel("날다람쥐");
$flyingSquirrelInstance->printRegidence();

$sabaInstance = new Saba("고등어");

test($sabaInstance);

function test(Breath $instance) {
    $instance->breath();
}

function test2(Swim $instance) {
    $instance->swimming();
}

test2($sabaInstance);
test2($whaleInstance);