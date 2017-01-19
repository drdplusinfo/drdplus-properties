<?php
namespace DrdPlus\Properties\Combat\Partials;

use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Tables;
use Granam\Integer\PositiveInteger;
use Granam\Integer\Tools\ToInteger;

abstract class AbstractRange extends CombatGameCharacteristic implements PositiveInteger
{
    /**
     * @param float|int|string $value
     * @return int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     */
    protected function sanitizeValue($value)
    {
        return ToInteger::toPositiveInteger($value);
    }

    /**
     * @param Tables $tables
     * @return int
     */
    public function getInMeters(Tables $tables)
    {
        // both encounter and maximal ranges are in fact distance bonus
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return (new DistanceBonus($this->getValue(), $tables->getDistanceTable()))->getDistance()->getMeters();
    }
}