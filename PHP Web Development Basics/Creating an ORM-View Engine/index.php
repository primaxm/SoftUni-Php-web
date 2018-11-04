<?php

use Database\DBConnection;

spl_autoload_register();
session_start();
$config = parse_ini_file("Config/db.ini");
//$db = DBConnection::GetConnection($config['dsn'], $config['user'], $config['password']);

try {
    $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$db = new \Database\PDODatabase($pdo);

$url = $_SERVER["REQUEST_URI"];

$urlData = preg_split('/\//', $url, null, PREG_SPLIT_NO_EMPTY);

$controller = $urlData[1]??"Products";
$action = $urlData[2]??"index";
$param = $urlData[3]??null;

define('APP_ROOT', $urlData[0]);

$controllerName = ucfirst($controller);
$controller = "Controllers\\".ucfirst($controller)."Controller";

try {
    if (!class_exists($controller)) {
        throw new Exception("Non valid controller");
    }

    $controllerObj = new $controller($db, $controllerName);


    if (!method_exists($controllerObj, $action)) {
        throw new Exception("Non valid action");
    }
    $controllerObj->$action($param);
} catch (Exception $e) {
    echo $e->getMessage();
}

