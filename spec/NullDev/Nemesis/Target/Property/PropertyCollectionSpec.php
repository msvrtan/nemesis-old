<?php

namespace spec\NullDev\Nemesis\Target\Property;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertyCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Property\PropertyCollection');
    }
}
