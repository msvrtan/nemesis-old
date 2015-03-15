<?php

namespace spec\NullDev\Nemesis\Target\Property;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertyItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Property\PropertyItem');
    }
}
