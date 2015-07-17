<?php
namespace DrdPlus\Properties\Exceptions;

class PersonIsAlreadySetTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @expectedException \LogicException
     */
    public function is_native_logic_exception()
    {
        throw new UnknownPropertyCode;
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Exceptions\Logic
     */
    public function is_marked_by_local_logic_exception()
    {
        throw new UnknownPropertyCode();
    }
}
