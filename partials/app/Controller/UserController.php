<?php

namespace Full\Recruitment\Controller;

use Full\Recruitment\Controller\Interfaces\IUserController;
use Full\Recruitment\Model\Interfaces\IUserRepository;
use Full\Recruitment\Utils\DataSanitizer;
use Full\Recruitment\Utils\GetUsersDataFromRequest;
use Full\Recruitment\Utils\Redirect;
use Full\Recruitment\Views\UserListView;

class UserController extends Redirect implements IUserController
{
    private IUserRepository $userRepository;
    private DataSanitizer $dataSanitizer;
    private GetUsersDataFromRequest $getUsersDataFromRequest;

    public function __construct(IUserRepository $userRepository, DataSanitizer $dataSanitizer, GetUsersDataFromRequest $getUsersDataFromRequest)
    {
        $this->userRepository = $userRepository;
        $this->dataSanitizer = $dataSanitizer;
        $this->getUsersDataFromRequest = $getUsersDataFromRequest;
    }

    public function removeUser(): void
    {
        $id = $_GET['id'] ?? '';
        $this->userRepository->removeUser($id);

        $this->redirectBack();
    }

    public function addUser(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newUserData = $this->getUsersDataFromRequest->getUserDataFromRequest();
            $sanitizedUserData = $this->dataSanitizer->sanitizeUserData($newUserData);
            $this->userRepository->addUser($sanitizedUserData);

            $this->redirectBack();
        }
    }

    public function showUserList(): void
    {
        $users = $this->userRepository->getAllUsers();
        $userListView = new UserListView();
        $userListView->render($users);
    }
}
