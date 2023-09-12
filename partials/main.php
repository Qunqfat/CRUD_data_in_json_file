<?php

use Full\Recruitment\Controller\HandleRequestController;
use Full\Recruitment\Controller\UserController;
use Full\Recruitment\Model\DataRepository;
use Full\Recruitment\Model\UserRepository;
use Full\Recruitment\Utils\DataSanitizer;
use Full\Recruitment\Utils\GetUsersDataFromRequest;

$vendorPath = __DIR__ . '/vendor/autoload.php';

try {
    if (file_exists($vendorPath)) {
        require $vendorPath;

        $dataPath = __DIR__ . '/../dataset/users.json';
        $dataSanitizer = new DataSanitizer();
        $getUsersDataFromRequest = new GetUsersDataFromRequest();
        $dataRepository = new DataRepository($dataPath);
        $userRepository = new UserRepository($dataRepository);
        $userController = new UserController($userRepository, $dataSanitizer, $getUsersDataFromRequest);
        $handleRequestController = new HandleRequestController($userController);
        $handleRequestController->handleRequest();
    } else {
        throw new Exception('Vendor folder or autoload.php not found.');
    }
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
