<?php

namespace Full\Recruitment\Controller;

use Full\Recruitment\Controller\Interfaces\IUserController;

class HandleRequestController
{

    private IUserController $userController;

    public function __construct(IUserController $userController)
    {
        $this->userController = $userController;
    }

    public function handleRequest()
    {
        try {
            $action = $_GET['action'] ?? '';

            switch ($action) {
                case 'remove':
                    $this->userController->removeUser();
                    break;
                case 'add':
                    $this->userController->addUser();
                    break;
                default:
                    $this->userController->showUserList();
                    break;
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
