<?php

require_once("dbConnection.php");
require_once(__DIR__ . '/../model/Package.php');


class packageRepository
{
    private $conn, $repo, $stmt;
    private string $sql_getWarehouse = "SELECT * FROM PACKAGE WHERE status='Warehouse'";
    private string $sql_getTruck = "SELECT * FROM PACKAGE WHERE status='Truck'";
    private string $sql_getDelivered = "SELECT * FROM PACKAGE WHERE status='Delivered'";
    private string $sql_createPackage = "INSERT INTO PACKAGE (plan, destination, status) VALUES (:plan, :destination, :status)";
    private string $sql_createInvoice = "INSERT INTO INVOICE (plan, firstName, lastName, email, phone, price, date) VALUES (:plan, :firstName, :lastName, :email, :phone, :price, now())";
    private string $sql_deletePackage = "DELETE FROM PACKAGE WHERE id =:id";
    private string $sql_loadToTruck = "UPDATE PACKAGE SET status = 'Truck' WHERE id =:id";
    private string $sql_dropOffPackage = "UPDATE PACKAGE SET status = 'Delivered' WHERE id =:id";

    public function __construct()
    {
        $this->repo = new dbConnection();
        $this->conn = $this->repo->startConnection();
    }

    function getWarehouse()
    {
        $this->stmt = $this->conn->prepare($this->sql_getWarehouse);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Package');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    function getTruck()
    {
        $this->stmt = $this->conn->prepare($this->sql_getTruck);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Package');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    function getDelivered()
    {
        $this->stmt = $this->conn->prepare($this->sql_getDelivered);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Package');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    public function createPackage($data)
    {
        $this->stmt = $this->conn->prepare($this->sql_createPackage);
        $this->stmt->execute($data) ?? false;
    }

    public function createInvoice($data)
    {
        $this->stmt = $this->conn->prepare($this->sql_createInvoice);
        $this->stmt->execute($data) ?? false;
    }

    public function deletePackage($id)
    {
        $this->stmt = $this->conn->prepare($this->sql_deletePackage);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->execute();
    }

    public function dropOff($id)
    {
        $this->stmt = $this->conn->prepare($this->sql_dropOffPackage);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->execute();
    }


    public function loadToTruck($id)
    {
        $this->stmt = $this->conn->prepare($this->sql_loadToTruck);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->execute();
    }
}