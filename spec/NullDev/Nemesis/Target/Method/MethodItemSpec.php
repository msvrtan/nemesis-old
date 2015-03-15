<?php

namespace spec\NullDev\Nemesis\Target\Method;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Method\MethodItem');
    }
}
