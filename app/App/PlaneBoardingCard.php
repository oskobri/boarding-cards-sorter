<?php

namespace App;

class PlaneBoardingCard extends BoardingCard
{
    public $gate;
    public $baggage_drop;

    public function __construct($boarding_card)
    {
        parent::__construct($boarding_card);

        $this->gate = $boarding_card['gate'];
        $this->baggage_drop = $boarding_card['baggage_drop'];
    }

    public function getDescription()
    {
        return "From $this->departure, take flight $this->number to $this->arrival. Gate $this->gate, seat $this->seat. " . (
            $this->baggage_drop ?
                "Baggage drop at ticket counter $this->baggage_drop." :
                'Baggage will be automatically transferred from your last leg.'
            );
    }
}
