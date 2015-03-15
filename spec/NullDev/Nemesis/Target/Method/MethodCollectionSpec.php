<?php

namespace spec\NullDev\Nemesis\Target\Method;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Method\MethodCollection');
    }
}
