<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\Attack;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Tests\Properties\Combat\Partials\CombatGameCharacteristicTest;

class AttackTest extends CombatGameCharacteristicTest
{
    protected function createSut()
    {
        return new Attack($this->createAgility(123));
    }

    /**
     * @test
     */
    public function My_attack_depends_on_agility()
    {
        for ($value = -5; $value < 10; $value++) {
            $attack = new Attack($this->createAgility($value));
            self::assertSame((int)floor($value / 2), $attack->getValue());
        }
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Agility
     */
    private function createAgility($value)
    {
        $agility = \Mockery::mock(Agility::class);
        $agility->shouldReceive('getValue')
            ->andReturn($value);

        return $agility;
    }
}