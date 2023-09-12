<?php

namespace Full\Recruitment\Controller\Interfaces;

interface IUserController
{
    public function removeUser(): void;

    public function addUser(): void;

    public function showUserList(): void;
}
