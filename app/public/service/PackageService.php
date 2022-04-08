<?php

require_once(__DIR__ . '/../repository/PackageRepository.php');


class PackageService
{
    private PackageRepository $repo;
    private float $VATValue = 0.21;

    public function __construct()
    {
        $this->repo = new PackageRepository();
    }

    public function getWarehouse() {
        return $this->repo->getWarehouse();
    }

    public function getTruck() {
        return $this->repo->getTruck();
    }

    public function getDelivered() {
        return $this->repo->getDelivered();
    }

    public function createPackage ($plan, $status, $destination)
    {
        $data = [
            'plan' => $plan,
            'status' => $status,
            'destination' => $destination,
        ];
        $this->repo->createPackage($data);
    }

    public function createInvoice ($plan, $firstName, $lastName, $email, $phone, $price)
    {
        $data = [
            'plan' => $plan,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'price' => $price,
        ];
        $this->repo->createInvoice($data);
    }

    public function deletePackage ($id) {
        $this->repo->deletePackage($id);
    }

    public function dropOff($id) {
        $this->repo->dropOff($id);
    }

    public function loadToTruck ($id) {
        $this->repo->loadToTruck($id);
    }

}