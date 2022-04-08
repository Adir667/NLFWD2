<?php

require_once(__DIR__ . '/../repository/UserRepository.php');

class UserService
{
    private UserRepository $repo;

    public function __construct()
    {
        $this->repo = new UserRepository();
    }

    public function login ($username, $password) {

        return $this->repo->login($username, $password);
    }
}