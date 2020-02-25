<?php

namespace Tests\Feature;

use App\Services\BoardingCardSorter;
use Tests\Support\Helpers\Fixture;

class BoardingCardSorterTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_load_boarding_cards_sample()
    {
        $boarding_cards_sample = (new Fixture())->getFixture('boarding_cards');

        $boardingCardSorter = (new BoardingCardSorter())->load($boarding_cards_sample);

        $this->assertCount(4, $boardingCardSorter->boardingCards);
    }

    /** @test */
    public function it_sort_boarding_cards()
    {
        $this->markTestIncomplete('TODO');
    }

    /** @test */
    public function it_display_journey_message()
    {
        $this->markTestIncomplete('TODO');
    }
}
