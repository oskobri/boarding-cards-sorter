<?php

namespace App\Services;

use Enums\BoardingCardType;

class BoardingCardSorter
{
    public $boardingCards = [];
    protected $arrivals = [];

    // Is BoardingCards already sorted
    protected $sorted = false;

    /**
     * Load Boarding Cards
     * @param $boarding_cards_sample
     */
    public function load($boarding_cards_sample)
    {
        $this->sorted = false;

        foreach ($boarding_cards_sample as $boarding_card_sample) {
            $boardingCardClass = BoardingCardType::getBoardingCardClassByType($boarding_card_sample['type']);
            $this->boardingCards[] = $boardingCard = new $boardingCardClass($boarding_card_sample);
            $this->arrivals[] =  $boardingCard->arrival;
        }

        return $this;
    }

    public function sort()
    {
        // Useless sort if only 1 card
        if(count($this->boardingCards) <= 1) {
            return $this->boardingCards;
        }

        $boardingCardsSorted = [];
        $totalUnsortedBoardingCardsLeft = count($this->boardingCards);

        // Put first BoardingCard on sorted list
        $boardingCardsSorted[] = $lastBoardingCard = $this->getFirstBoardingCard();

        // Decrements first BoardingCard from the unsorted list total
        --$totalUnsortedBoardingCardsLeft;

        do {
            $this->getNextBoardingCard($boardingCardsSorted, $lastBoardingCard);
            --$totalUnsortedBoardingCardsLeft;
        } while($totalUnsortedBoardingCardsLeft);

        $this->boardingCards = $boardingCardsSorted;
        $this->sorted = true;

        return $this;
    }

    /**
     * Display message of the journey for each BoardingCard
     */
    public function journey()
    {
        if(!$this->sorted) {
            $this->sort();
        }

        foreach($this->boardingCards as $boardingCard) {
            echo $boardingCard->getDescription() . "\n";
        }

        echo "You have arrived at your final destination.";
    }

    protected function getFirstBoardingCard()
    {
        foreach ($this->boardingCards as $boardingCard) {
            if (in_array($boardingCard->departure, $this->arrivals)) {
                continue;
            }
            return $boardingCard;
        }
        return null;
    }

    protected function getNextBoardingCard(&$boardingCardsSorted, &$lastBoardingCard)
    {
        foreach ($this->boardingCards as $i => $boardingCard) {

            // Get next BoardingCard
            if($boardingCard->departure === $lastBoardingCard->arrival) {
                $boardingCardsSorted[] = $lastBoardingCard = $boardingCard;

                // remove already sorted BoardingCard
                unset($this->boardingCards[$i]);
                break;
            }
        }
    }
}
