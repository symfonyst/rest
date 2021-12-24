<?php

namespace App\Dto\Weather;

class WeatherDto
{
    /** @var float */
    private $temp;

    /** @var float */
    public $feels_like;

    /** @var float */
    public $temp_min;

    /** @var float */
    public $temp_max;

    /**
     * @return float
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * @param $temp
     */
    public function setTemp($temp)
    {
        $this->temp = $temp;
    }
}