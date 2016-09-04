<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Tools\Calculations\SumAndRound;

class DefenseNumber extends CombatGameCharacteristic
{

    /**
     * @param Agility $agility
     */
    public function __construct(Agility $agility)
    {
        parent::__construct(SumAndRound::ceiledHalf($agility->getValue()));
    }

}