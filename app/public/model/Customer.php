<?php

class Customer
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

}