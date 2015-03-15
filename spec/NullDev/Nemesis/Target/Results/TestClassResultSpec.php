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
}
