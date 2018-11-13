<?php

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, array $formData) {
        $user = new UserDTO(); //трябва да го пращам отвън, но ако остане време :-)
        if (isset($formData['register'])) {
            try {
                $user = $this->dataBinder->binde($formData, UserDTO::class);
                $userId = $userService->register($user, $formData['confirm_password']);
                $_SESSION['id'] = $userId;
                $_SESSION['success'] = "Congratulation, " . $formData['username'] . ". Login our platform";
                $this->redirect("login.php");
            } catch (\Exception $e) {
                $user->setError($e->getMessage());
                $user->setData($formData);
                $this->render("/users/register", $user);
            }

        } else {
            $this->render("/users/register", $user);
        }
    }

    public function login(UserServiceInterface $userService, array $formData) {
        $currentUser = new UserDTO();
        if (isset($formData['login'])) {
            try {
                $currentUser = $userService->login($formData['username'],$formData['password']);
                $_SESSION['id'] = $currentUser->getUserId();
                $this->redirect("profile.php");
            } catch (\Exception $e) {
                $currentUser->setError($e->getMessage());
                $this->render("/users/login", $currentUser);
            }

        } else {
            $this->render("users/login", $currentUser);
        }
    }

    public function profile(UserServiceInterface $userService) {
        if (isset($_SESSION['id'])) {
            $currentUser = $userService->profile($_SESSION['id']);
            $this->render("/users/profile", $currentUser);
        } else {
            $this->redirect("login.php");
        }

    }

}