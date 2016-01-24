<?php

function sess_start()
{

	$sessionPath = ini_get('session.save_path');
	$GLOBALS['_SESS'] = [];

	if(!empty($_COOKIE['PHPSESSID'])) {

		// получаем имя файла сессии из cookie
		$sessFile = 'sess_' . $_COOKIE['PHPSESSID'];
		// полный путь к файлу сессии
		$filePath = $sessionPath . '/' . $sessFile;
		// читаем файл сессии
		$sessionData = file_get_contents($filePath);
		// десериализируем данные из _SESS
		$GLOBALS['_SESS'] = unserialize($sessionData);
		register_shutdown_function('setSessCookie', $sessFile, $filePath);

	} else {

		// генерируем имя файла сессии
		$newSessName = uniqid('sess_');
		// полный путь к файлу сессии
		$filePath = $sessionPath . '/' . $newSessName;
		register_shutdown_function('setSessCookie', $newSessName, $filePath);

	}

}

function setSessCookie($sessionFile, $filePath)
{

	// записываем в файл сериализованный массив _SESS
	file_put_contents($filePath, serialize($GLOBALS['_SESS']));
	// имя для cookie, как имя сессии
	$cookieName = ini_get('session.name');
	// обрезаем sess_, получаем значение для cookie
	$cookieValue = substr($sessionFile, 5);
	// устанавливаем cookie
	setcookie($cookieName, $cookieValue);

}