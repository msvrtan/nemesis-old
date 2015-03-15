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

    public function let()
    {
        $this->beConstructedWith();
    }
}
