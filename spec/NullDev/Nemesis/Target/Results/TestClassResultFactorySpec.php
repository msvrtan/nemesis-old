<?php

namespace spec\NullDev\Nemesis\Target\Results;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestClassResultFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Results\TestClassResultFactory');
    }
}
