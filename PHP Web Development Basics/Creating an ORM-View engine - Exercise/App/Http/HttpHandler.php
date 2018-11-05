<?php

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, array $formData)
    {
        if (isset($formData['register'])) {
            $this->HandleRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    public function login(UserServiceInterface $userService, array $formData) {
        if (isset($formData['login'])) {
            $this->HandleLoginProcess($userService, $formData);
        } else {
            $this->render("users/login");
        }
    }

    public function profile(UserServiceInterface $userService, array $formData) {

        $currentUser = $userService->currentUser();

        if ($currentUser === null) {
            $this->redirect("login.php");
        }



        if (isset($formData['edit'])) {
            $this->HandleEditProcess($userService, $formData);
        } else {
            $this->render("users/profile", $currentUser);
        }
    }

    public function allUsers(UserServiceInterface $userService) {
        $this->render("users/all", $userService->all());

    }

    public function index() {
        $this->render("/home/index");
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    public function HandleRegisterProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->binde($formData, UserDTO::class);
        /*$user = UserDTO::create(
            $formData['username'],
            $formData['password'],
            $formData['first_name'],
            $formData['last_name'],
            $formData['birth_date']
        );*/

        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect("login.php");
        } else{
            $this->render("/app/error", new ErrorDTO("Username is already taken or password mismatch"));
        }
    }

    public function HandleLoginProcess(UserServiceInterface $userService, array $formData): void
    {
        $currentUser = $userService->login($formData['username'],$formData['password']);

        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect("profile.php");
        } else {
            //$this->render("users/login");
            $this->render("/app/error", new ErrorDTO("Username does not exist or password mismatch"));
        }
    }

    public function HandleEditProcess(UserServiceInterface $userService, array $formData)
    {
        $user = $this->dataBinder->binde($formData, UserDTO::class);
        /*$user = UserDTO::create(
            $formData['username'],
            $formData['password'],
            $formData['first_name'],
            $formData['last_name'],
            $formData['birth_date']
        );*/

        if($userService->edit($user)){
            $this->redirect("profile.php");
        } else {
            $this->render("/app/error", new ErrorDTO("Error editing profile"));
        }
    }
}
