<?php

namespace Full\Recruitment\Model;

use Full\Recruitment\Model\Interfaces\IDataRepository;
use Full\Recruitment\Model\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    private IDataRepository $dataRepository;

    public function __construct(IDataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function getAllUsers(): ?array
    {
        return $this->dataRepository->loadData();
    }

    public function addUser(array $userData): void
    {
        $data = $this->dataRepository->loadData();
        $newId = $this->getNewUserId($data);

        $userData['id'] = $newId;
        $data[] = $userData;

        $this->dataRepository->saveData($data);
    }

    public function removeUser(int $id): void
    {
        $data = $this->dataRepository->loadData();

        $newData = array_filter($data, function ($var) use ($id) {
            return ($var['id'] != $id);
        });

        $this->dataRepository->saveData($newData);
    }

    private function getNewUserId(array $data): int
    {
        $lastRecord = end($data);
        $newId = $lastRecord ? $lastRecord['id'] + 1 : 1;
        return $newId;
    }
}
