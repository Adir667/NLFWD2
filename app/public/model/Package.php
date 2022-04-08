<?php

class Package implements \JsonSerializable {

    private int $id;
    private string $plan, $status, $destination;
    //private DateTime $delivered;


    public function jsonSerialize() : array
    {
        return get_object_vars($this);
    }

}