<?php

namespace Full\Recruitment\Model\Interfaces;

interface IUserRepository
{
    public function getAllUsers(): ?array;

    public function addUser(array $userData): void;

    public function removeUser(int $id): void;
}
