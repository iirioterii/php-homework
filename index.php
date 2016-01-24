<?php

use Src\NewClass;
use PHP_Group\Bogdan;

require_once('vendor/autoload.php');

$newClass = new NewClass();
$newClass->test();

$bogdan = new Bogdan();
$bogdan->sayHello();
