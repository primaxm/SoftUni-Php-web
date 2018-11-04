<?php

namespace Controllers;


use Database\PDODatabase;

class UsersController extends BaseController
{
    /**
     * UsersController constructor.
     * @param PDODatabase $db
     * @param string $controllerName
     */
    public function __construct(PDODatabase $db, string $controllerName)
    {
        parent::__construct($db, $controllerName);
        $this->model = new \Models\Users($this->db);
    }

    /**
     * @throws \Exception
     */
    public function index() {
        $this->register();
    }

    /**
     * @throws \Exception
     */
    public function register() {
        if ($_POST) {
            $this->model->saveUser();
            $this->redirect("/");
            //header("Location: " . APP_ROOT);
        } else {
            $this->renderView(__FUNCTION__);
        }
    }

    /**
     * @throws \Exception
     */
    public function login() {
        if ($_POST) {
            $userid = $this->model->logUser();
            if ($userid) {
                $_SESSION['userid'] = $userid;
                $this->redirect("/");
            }
            $this->redirect("/users/login/notlogin");
        }
        $this->renderView(__FUNCTION__);
    }

    public function checkSession()
    {
        return true;
    }

}