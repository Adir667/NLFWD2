<?php

require_once("dbConnection.php");
require_once(__DIR__ . '/../model/User.php');

class userRepository
{
    private $connection, $repo;

    public function __construct()
    {
        $this->repo = new dbConnection();
        $this->connection = $this->repo->startConnection();
    }

    function login($username, $password)
    {
        $sql = "SELECT * FROM EMPLOYEE WHERE username='$username' AND password='$password'";
        $result = $this->connection->query($sql);
        $count = $result->fetchColumn();
        if ($count != 0) {
            return true;
        }
    }

}