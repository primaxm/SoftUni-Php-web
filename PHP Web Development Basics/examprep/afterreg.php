<?php

include "common.php";

$indexHttpHandler = new \App\Http\IndexHttpHandler($template, new \Core\DataBinder());
$indexHttpHandler->afterreg();