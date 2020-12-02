<?php

    namespace MVC\Webroot;

    use MVC\Dispatcher;
    use MVC\Request;
    use MVC\Router;
    use MVC\Config\Core;

    define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
    define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

    require_once __DIR__ . '/../vendor/autoload.php';

    $dispatch = new Dispatcher();
    $dispatch->dispatch();

?>