<?php

class Templater
{

    public $content = '';
    public $path = '';

    public function __construct($path) {
        $this->path = $path;
    }
    public function load() {
        // Вытягиваем из браузера станицу
        if (isset($_REQUEST['page'])) {
            $page = trim($_REQUEST['page']);
        } else {
            $page = 'main';
        }
        // Если есть файл с таким именем то подключаем и кидаем в шаблон
        if (file_exists($this->path. $page.'.phtml')) {
            ob_start();
            require_once $this->path. $page. '.phtml';
            $this->content = ob_get_clean();
            require_once  $_SERVER["DOCUMENT_ROOT"] . 'layout/'. 'layout.phtml';
            return ob_get_clean();
        // Если файла нет, подключаем 404
        } else {
           require_once $this->path. '404.phtml';
            $this->content = ob_get_clean();
            require_once  $_SERVER["DOCUMENT_ROOT"] . 'layout/'. 'layout.phtml';
            return ob_get_clean();
        }
    }

}


