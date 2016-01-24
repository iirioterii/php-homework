<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../classes/Templater.php');

$temp = new Templater('../pages/');
echo $temp->load();
