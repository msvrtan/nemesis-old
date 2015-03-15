<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestGeneratorsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestGenerators');
    }
}
