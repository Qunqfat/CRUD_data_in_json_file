<?php

namespace Full\Recruitment\Model;

use Full\Recruitment\Model\Interfaces\IDataRepository;

class DataRepository implements IDataRepository
{
    private $dataPath;

    public function __construct($dataPath)
    {
        $this->dataPath = $dataPath;
    }

    public function loadData(): ?array
    {
        if (!file_exists($this->dataPath)) {
            throw new \Exception('File with user data not found.');
        }

        return json_decode(file_get_contents($this->dataPath), true);
    }

    public function saveData(array $data): void
    {
        file_put_contents($this->dataPath, json_encode($data));
    }
}
