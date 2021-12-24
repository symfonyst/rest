<?php

namespace App\Dto;

class Address
{
    /** @var string|null */
    private $city;

    /** @var string|null */
    private $street;

    /** @var string|null */
    private $house;

    /** @var int|null */
    private $flat;

    /**
     * @param string $city
     */
    public function setCity($city){
        $this->city = $city;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param string $house
     */
    public function setHouse($house)
    {
        $this->house = $house;
    }

    /**
     * @param int $flat
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;
    }
}