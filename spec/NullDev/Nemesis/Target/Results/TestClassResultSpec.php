<?php

namespace spec\NullDev\Nemesis\Target\Results;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestClassResultSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Results\TestClassResult');
    }

    /**
     * @param NullDev\Nemesis\Target\Import\ImportCollection     $importCollection
     * @param NullDev\Nemesis\Target\Property\PropertyCollection $propertyCollection
     * @param NullDev\Nemesis\Target\Method\MethodCollection     $methodCollection
     */
    public function let($importCollection, $propertyCollection, $methodCollection)
    {
        $this->beConstructedWith($importCollection, $propertyCollection, $methodCollection);
    }

    public function it_should_know_class_name()
    {
        $this->setClassName('ClassName');
        $this->getClassName()->shouldReturn('ClassName');
    }

    public function it_should_know_namespace()
    {
        $this->setNamespace('Vendor\Package\Namespace');
        $this->getNamespace()->shouldReturn('Vendor\Package\Namespace');
    }

    public function it_should_know_extending_class_name()
    {
        $this->setExtendsClassName('SomeVendor\SomePackage\SomeNamespace\ParentClass');
        $this->getExtendsClassName()->shouldReturn('SomeVendor\SomePackage\SomeNamespace\ParentClass');
    }

    /**
     * @param NullDev\Nemesis\Target\Import\ImportItem $importItem
     */
    public function it_should_support_adding_new_import_item($importItem)
    {
        $this->addImportItem($importItem);
    }

    /**
     * @param NullDev\Nemesis\Target\Property\PropertyItem $propertyItem
     */
    public function it_should_support_adding_new_property_item($propertyItem)
    {
        $this->addPropertyItem($propertyItem);
    }

    /**
     * @param NullDev\Nemesis\Target\Method\MethodItem $methodItem
     */
    public function it_should_support_adding_new_method_item($methodItem)
    {
        $this->addMethodItem($methodItem);
    }

    /**
     */
    public function it_should_return_all_import_items()
    {
        $this->getImportCollection();
    }

    /**
     */
    public function it_should_return_all_property_items()
    {
        $this->getPropertyCollection();
    }

    /**
     */
    public function it_should_return_all_method_items()
    {
        $this->getMethodCollection();
    }
}
