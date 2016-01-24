<?php


// функция автозагрузчика
function myAutoloader($class) {

    // особый для проекта namespace префикс
    $prefix = 'Itcourses\\Web\\';
    // папка для префикса
    $base_dir = __DIR__ . '/src/';
    // проверка на иcпользование классом префикса namespace
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // относительное имя класса
    $relative_class = substr($class, $len);
    // меняем \\ и доавляем к имени класса .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // Если файл существует, подключаем его
    if (file_exists($file)) {
        include $file;
    }

};





