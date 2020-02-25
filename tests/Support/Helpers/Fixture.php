<?php

namespace Tests\Support\Helpers;

class Fixture
{
    public function getFixture($name)
    {
        return json_decode(file_get_contents(__DIR__ . '/../..//fixtures/boarding_cards.json'), true);
    }
}
