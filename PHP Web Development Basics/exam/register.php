<?php

include "common.php";

$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, new \Core\DataBinder());
$userHttpHandler->register($userService, $_POST);