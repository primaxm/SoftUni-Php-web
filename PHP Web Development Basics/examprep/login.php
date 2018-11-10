<?php
include "common.php";

$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, new \Core\DataBinder());
$userHttpHandler->login($userService, $_POST);