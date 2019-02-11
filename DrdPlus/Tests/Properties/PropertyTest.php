<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Properties;

use DrdPlus\Codes\Partials\AbstractCode;
use DrdPlus\Properties\Property;
use Granam\Tests\Tools\TestWithMockery;

abstract class PropertyTest extends TestWithMockery
{

    /**
     * @test
     */
    abstract public function I_can_get_property_easily();

    /**
     * @test
     */
    public function I_can_use_it_as_generic_group_property()
    {
        $propertyClass = self::getSutClass();
        self::assertTrue(
            is_a($propertyClass, $this->getGenericGroupPropertyClassName(), true),
            $propertyClass . ' does not belongs into ' . $this->getGenericGroupPropertyClassName()
        );
    }

    private function getGenericGroupPropertyClassName()
    {
        $propertyNamespace = $this->getPropertyNamespace();
        $namespaceBaseName = preg_replace('~^[\\\]?(\w+\\\){0,5}(\w+)$~', '$2', $propertyNamespace);
        $groupPropertyClassBaseName = preg_replace('~s$~', '', $namespaceBaseName) . 'Property';

        return $propertyNamespace . '\\' . $groupPropertyClassBaseName;
    }

    /**
     * @return string
     */
    protected function getPropertyNamespace()
    {
        return preg_replace('~[\\\]\w+$~', '', self::getSutClass());
    }

    /**
     * @test
     */
    public function I_can_get_code()
    {
        $reflectionClass = new \ReflectionClass(self::getSutClass());
        /** @var Property $sut */
        $sut = $reflectionClass->newInstanceWithoutConstructor();
        /** @var AbstractCode $codeClass */
        $codeClass = $this->getExpectedCodeClass();
        self::assertSame($codeClass::getIt($this->getExpectedPropertyCode()), $sut->getCode());
    }

    /**
     * @return string
     */
    protected function getExpectedPropertyCode(): string
    {
        $propertyBaseName = $this->getSutBaseName();
        $underScoredClassName = preg_replace('~(\w)([A-Z])~', '$1_$2', $propertyBaseName);

        return strtolower($underScoredClassName);
    }

    /**
     * @return string
     */
    protected function getSutBaseName(): string
    {
        return preg_replace('~^.*[\\\]([^\\\]+)$~', '$1', self::getSutClass());
    }

    /**
     * @test
     */
    public function Code_getter_is_properly_annotated(): void
    {
        $getter = new \ReflectionMethod(self::getSutClass(), 'getCode');
        $codeClassBaseName = preg_replace('~^.*[\\\]([^\\\]+)$~', '$1', $this->getExpectedCodeClass());
        self::assertSame(<<<PHPDOC
/**
     * @return {$codeClassBaseName}
     */
PHPDOC
            ,
            $getter->getDocComment(),
            \sprintf('Method %s::getCode does not have properly annotated code getter', self::getSutClass())
        );
    }

    /**
     * @return string
     */
    abstract protected function getExpectedCodeClass();
}