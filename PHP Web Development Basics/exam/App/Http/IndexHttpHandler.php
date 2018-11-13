<?php
namespace App\Http;

class IndexHttpHandler extends HttpHandlerAbstract
{
    public function index() {
        if(isset($_SESSION['id'])) {
            $this->redirect("profile.php");
        } else {
            $this->render("home/index");
        }
    }

}