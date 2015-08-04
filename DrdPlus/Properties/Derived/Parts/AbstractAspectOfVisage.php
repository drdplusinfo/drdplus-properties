<?php
namespace DrdPlus\Properties\Derived\Parts;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Tools\Numbers\SumAndRound;
use Granam\Integer\IntegerInterface;
use Granam\Strict\Object\StrictObject;

abstract class AbstractAspectOfVisage extends StrictObject implements DerivedPropertyInterface
{

    /**
     * @param IntegerInterface $firstProperty
     * @param IntegerInterface $secondProperty
     * @param Charisma $charisma
     *
     * @return int
     */
    protected function calculateValue(IntegerInterface $firstProperty, IntegerInterface $secondProperty, Charisma $charisma)
    {
        return SumAndRound::average($firstProperty->getValue(), $secondProperty->getValue()) + SumAndRound::half($charisma->getValue());
    }
}