<?php

namespace Full\Recruitment\Model\Interfaces;

interface IDataRepository
{
    public function loadData(): ?array;

    public function saveData(array $data): void;
}
