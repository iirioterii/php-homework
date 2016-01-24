<?php

use MyTest\Test;
use Src\NewClass;
use PHP_Group\Bogdan;

require_once('vendor/autoload.php');

$test = new Test();
$test->hello();

$newClass = new NewClass();
$newClass->test();

$bogdan = new Bogdan();
$bogdan->sayHello();
