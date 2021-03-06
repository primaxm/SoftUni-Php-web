<?php
include "common.php";

$taskRepository = new \App\Repository\TaskRepository($db);
$taskService = new \App\Service\TaskService($taskRepository);
$taskHttpHandler = new \App\Http\TaskHttpHandler($template, new \Core\DataBinder());
$taskHttpHandler->dashboard($taskService);