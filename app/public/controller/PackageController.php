<?php

require_once(__DIR__ . '/../service/PackageService.php');

class PackageController
{

    private PackageService $service;

    public function __construct()
    {
        session_start();
        $_SESSION['User'] = "Admin";
        $this->service = new PackageService();
    }

    public function form($plan, $price)
    {
        $plan = $plan;
        $price = $price;
        require_once(__DIR__ . '/../view/form.php');
    }

    public function confirm()
    {
        require_once(__DIR__ . '/../view/confirm.html');
    }

    public function adminDashboard()
    {
        $_SESSION['User'] = "Admin";
        $packages = $this->service->getWarehouse();
        //echo json_encode($packages);
        require_once(__DIR__ . '/../view/dashboard.php');
    }

    public function signout()
    {
        session_destroy();
        echo "bye";
    }

    public function getWarehouse()
    {
        $packages = $this->service->getWarehouse();
        echo json_encode($packages);
    }

    public function getTruck()
    {
        $packages = $this->service->getTruck();
        echo json_encode($packages);
    }

    public function getDelivered()
    {
        $packages = $this->service->getDelivered();
        echo json_encode($packages);
    }

    public function createPackage($vars)
    {
        $plan = $vars["plan"];
        $status = $vars["status"];
        $destination = $vars["destination"];

        $this->service->createPackage($plan, $status, $destination);
    }

    public function createInvoice($vars)
    {
        $plan = $vars["plan"];
        $firstName = $vars["firstName"];
        $lastName = $vars["lastName"];
        $email = $vars["email"];
        $phone = $vars["phone"];
        $price = $vars["price"];

        $this->service->createInvoice($plan, $firstName, $lastName, $email, $phone, $price);
    }

    public function deletePackage($id)
    {
        $this->service->deletePackage($id);
    }

    public function dropOff($id)
    {
        $this->service->dropOff($id);
    }

    public function loadToTruck($id)
    {
        $this->service->loadToTruck($id);
    }

}