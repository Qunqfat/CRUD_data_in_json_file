<?php

namespace Full\Recruitment\Utils;

class GetUsersDataFromRequest
{
    public function getUserDataFromRequest(): array
    {
        $userData = [
            'id' => $_POST['id'] ?? '',
            'name' => $_POST['name'] ?? '',
            'username' => $_POST['username'] ?? '',
            'email' => $_POST['email'] ?? '',
            'address' => [
                'street' => $_POST['street'] ?? '',
                'suite' => $_POST['suite'] ?? '',
                'city' => $_POST['city'] ?? '',
                'zipcode' => $_POST['zipcode'] ?? '',
                'geo' => [
                    'lat' => $_POST['lat'] ?? '',
                    'lng' => $_POST['lng'] ?? '',
                ],
            ],
            'phone' => $_POST['phone'] ?? '',
            'website' => $_POST['website'] ?? '',
            'company' => [
                'name' => $_POST['company_name'] ?? '',
                'catchPhrase' => $_POST['catchPhrase'] ?? '',
                'bs' => $_POST['bs'] ?? '',
            ],
        ];

        return $userData;
    }
}
