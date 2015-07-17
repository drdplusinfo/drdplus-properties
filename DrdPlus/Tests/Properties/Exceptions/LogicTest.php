<?php
namespace DrdPlus\Properties\Exceptions;

class LogicTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function is_interface()
    {
        $this->assertTrue(interface_exists(Logic::class));
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Exceptions\Exception
     */
    public function extends_local_exception_interface()
    {
        throw new TestLogicInterface();
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Exceptions\TestLogicInterface
     */
    public function is_not_runtime_exception_interface()
    {
        try {
            throw new TestLogicInterface();
        } catch (Runtime $shouldNotBeCached) {
            $this->fail('Logic exception interface must not be a runtime exception interface.');
        }
    }
}

/** inner */
class TestLogicInterface extends \Exception implements Logic
{

}
