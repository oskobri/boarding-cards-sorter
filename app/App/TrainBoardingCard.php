<?php

namespace App;

class TrainBoardingCard extends BoardingCard
{
    public function getDescription()
    {
        return "Take train $this->number from $this->departure to $this->arrival. " . (
            $this->seat ?
                "Sit in seat $this->seat." :
                'No seat assigment.'
            );
    }
}
