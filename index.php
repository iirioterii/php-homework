<?php

include_once 'autoload.php';

spl_autoload_register('myAutoloader');

$first =  new Itcourses\Web\Writer\First();
$first->call();

$first =  new Itcourses\Web\Writer\Second();
$first->call();

$first =  new Itcourses\Web\Writer\Third();
$first->call();
