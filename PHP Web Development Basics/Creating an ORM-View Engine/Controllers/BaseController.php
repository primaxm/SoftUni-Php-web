<?php

namespace Controllers;


use Database\PDODatabase;

class BaseController
{
    /**
     * @var PDODatabase
     */
    protected $db;

    /**
     * @var \Models\Products
     */
    protected $model;

    /**
     * @var string
     */
    protected $controllerName;

    /**
     * BaseController constructor.
     * @param PDODatabase $db
     * @param string $controllerName
     */
    public function __construct(PDODatabase $db, string $controllerName)
    {
        $this->db = $db;
        $this->controllerName = $controllerName;
        $userid =  $this->checkSession();

        if (!$userid) {
            header("Location: " . APP_ROOT . "/users/login");
            exit;
        }
    }

    protected function renderView(string $viewName, $data = []) {
        include "Views/header.php";
        include "Views/" . $viewName . ".php";
        include "Views/footer.php";
    }

    public function checkSession() {
        if (!$_SESSION['userid']) {
            return null;
        }
        return $_SESSION['userid'];
    }


    protected function redirect(string $url)
    {
        $location = "Location: " . APP_ROOT . "$url";
        echo $location;
        header("$location");
        exit;
    }
}