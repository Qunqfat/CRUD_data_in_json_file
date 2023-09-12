<?php

namespace Full\Recruitment\Utils;

class Redirect
{
    protected function redirectBack()
    {
        $mainPageUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        header("Location: " . $mainPageUrl);
        exit();
    }
}
