<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// закодированная срока
$coded = 'first|i:1;second|i:2;third|i:3;';

// бьем на части по ;
$part = strtok($coded, ";");

// пропускаем части через цикл
while ($part !== false) {
    // пустой массив
    $arr = [];
    $temp = $part;
    // получаем ключ
    $key = substr($temp, 0, strpos($temp, "|"));
    // получаем значение
    $value = trim(substr($temp, strrpos($temp, ":") + 1), "\"");
    // формируем массив
    $arr[$key] = $value;
    $part = strtok(";");
    // вывод
    var_dump($arr);
}
