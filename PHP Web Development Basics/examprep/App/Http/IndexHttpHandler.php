<?php
namespace App\Http;

class IndexHttpHandler extends HttpHandlerAbstract
{
    public function index() {
        $this->render("/home/index");
    }

    public function afterreg() {
        $this->render("/home/afterreg");
    }
}