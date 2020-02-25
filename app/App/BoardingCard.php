<?php

namespace App;

abstract class BoardingCard
{
    public $number;
    public $arrival;
    public $departure;
    public $seat;

    public function __construct($boarding_card)
    {
        $this->number = $boarding_card['number'];
        $this->arrival = $boarding_card['arrival'];
        $this->departure = $boarding_card['departure'];
        $this->seat = $boarding_card['seat'];
    }

    /**
     * Message displayed to Owner
     * @return string
     */
    abstract public function getDescription();
}
