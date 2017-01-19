<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Fatigue\FatigueBonus;
use DrdPlus\Tables\Tables;

class FatigueBoundary extends AbstractDerivedProperty
{
    const FATIGUE_BOUNDARY = PropertyCode::FATIGUE_BOUNDARY;

    // TODO PPH page 117 left column little catty Mrrr and its less-than-one fatigue boundary...
    /**
     * @param Endurance $endurance
     * @param Tables $tables
     */
    public function __construct(Endurance $endurance, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(
            $tables->getFatigueTable()->toFatigue(
                new FatigueBonus(
                    $endurance->getValue() + 10,
                    $tables->getFatigueTable()
                )
            )->getValue()
        );
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::FATIGUE_BOUNDARY);
    }
}