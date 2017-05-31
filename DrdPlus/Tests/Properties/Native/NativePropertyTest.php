<?php
namespace DrdPlus\Tests\Properties\Native;

use DrdPlus\Tests\Properties\AbstractBooleanStoredPropertyTest;

abstract class NativePropertyTest extends AbstractBooleanStoredPropertyTest
{
    /**
     * @test
     */
    public function Its_factory_method_has_return_value_annotated()
    {
        $reflectionClass = new \ReflectionClass(self::getSutClass());
        $classBasename = preg_replace('~^.+[\\\](\w+)$~', '$1', self::getSutClass());
        self::assertContains(<<<ANNOTATION
/**
 * @method static {$classBasename} getIt(\$value)
 */
ANNOTATION
            , (string)$reflectionClass->getDocComment());
    }
}
