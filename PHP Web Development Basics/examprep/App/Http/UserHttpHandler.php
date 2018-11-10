<?php

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, array $formData, UserDTO $user) {
        if (isset($formData['register'])) {
            try {
                $user = $this->dataBinder->binde($formData, UserDTO::class);
                $userId = $userService->register($user, $formData['confirm_password']);
                $_SESSION['id'] = $userId;
                $this->redirect("afterreg.php");
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
                $this->redirect("dashboard.php");
            } catch (\Exception $e) {
                $currentUser->setError($e->getMessage());
                $this->render("/users/login", $currentUser);
            }

        } else {
            $this->render("users/login", $currentUser);
        }
    }


}