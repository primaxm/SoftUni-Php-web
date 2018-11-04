<?php

spl_autoload_register(function ($class) {

    $sources = array("../Controllers/$class.php", "../Lib/$class.php ",  "../Models/$class.php ", "../$class.php " );

    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        }
    }
});



$db = DBConnection::GetConnection();

$products_obj = new Products($db);

include "../header.php";


include "../footer.php";