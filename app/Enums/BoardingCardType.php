<?php

namespace Enums;

use App\BusBoardingCard;
use App\PlaneBoardingCard;
use App\TrainBoardingCard;

class BoardingCardType
{
    const BUS = 'bus';
    const TRAIN = 'train';
    const PLANE = 'plane';

    public static function getBoardingCardClassByType($type)
    {
        switch($type) {
            case static::BUS;
                return BusBoardingCard::class;
                break;
            case static::TRAIN;
                return TrainBoardingCard::class;
                break;
            case static::PLANE;
                return PlaneBoardingCard::class;
                break;
            default:
                throw new \Exception('Invalid boarding card type');
        }
    }
}
