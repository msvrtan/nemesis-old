<?php

namespace spec\NullDev\Nemesis\Target\TestGenerators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasicUnitTestGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestGenerators\BasicUnitTestGenerator');
    }
}
