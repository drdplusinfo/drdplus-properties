<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Dignity;

class DignityTest extends AbstractTestOfAspectOfVisage
{

    /**
     * #@test
     */
    public function I_can_create_dignity()
    {
        $dignity = new Dignity($this->getIntelligence($agilityValue = 123), $this->getWill($knackValue = 456), $this->getCharisma($charismaValue = 789));
        $this->assertSame('dignity', $dignity->getCode());
        $this->assertSame('dignity', $dignity->getCode());
        $this->assertSame($this->calculateValue($agilityValue, $knackValue, $charismaValue), $dignity->getValue());
        $this->assertSame((string)$this->calculateValue($agilityValue, $knackValue, $charismaValue), "$dignity");
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Intelligence
     */
    private function getIntelligence($value)
    {
        return $this->createProperty(Intelligence::class, $value);
    }

    /**
     * @param $className
     * @param $value
     * @return \Mockery\MockInterface
     */
    private function createProperty($className, $value)
    {
        $property = $this->mockery($className);
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $property->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn($value);

        return $property;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Will
     */
    private function getWill($value)
    {
        return $this->createProperty(Will::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Charisma
     */
    private function getCharisma($value)
    {
        return $this->createProperty(Charisma::class, $value);
    }
}