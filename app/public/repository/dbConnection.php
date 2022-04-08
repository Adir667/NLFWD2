<?php

class dbConnection
{
    public function startConnection()
    {
        require __DIR__ . '/../../dbconfig.php';
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            #echo "Connected to $dbname at $host successfully.";
        } catch (PDOException $pe) {
            die("Could not connect to the database $databasename :" . $pe->getMessage());
        }
    }
}