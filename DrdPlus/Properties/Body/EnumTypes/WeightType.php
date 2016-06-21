<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class WeightType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCode::WEIGHT_IN_KG
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const WEIGHT = 'weight';

    /**
     * @return string
     */
    public function getName()
    {
        return self::WEIGHT;
    }
}
