<?php

require_once (__DIR__ . '/../service/UserService.php');

class UserController
{

    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function login ($username, $password) {
        return $this->service->login($username, $password);
    }
}