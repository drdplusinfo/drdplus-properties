<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\Properties\PropertyCode;

class Taste extends RemarkableSenseProperty
{

    /**
     * @return Taste|RemarkableSenseProperty
     */
    public static function getIt(): Taste
    {
        return static::getEnum(PropertyCode::TASTE);
    }

    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::TASTE);
    }
}