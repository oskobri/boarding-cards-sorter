<?php

namespace App;

class BusBoardingCard extends BoardingCard
{
    public function getDescription()
    {
        return "Take the $this->number bus from $this->departure to $this->arrival. " . (
            $this->seat ?
                "Sit in seat $this->seat." :
                'No seat assigment.'
            );
    }
}
