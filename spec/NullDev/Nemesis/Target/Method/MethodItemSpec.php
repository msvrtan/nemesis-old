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

    public function it_should_support_method_visibility()
    {
        $this->setVisibility('protected');
        $this->getVisibility()->shouldReturn('protected');
    }

    public function it_has_public_as_default_visiblity()
    {
        $this->getVisibility()->shouldReturn('public');
    }

    public function it_should_support_method_name()
    {
        $this->setName('methodName');
        $this->getName()->shouldReturn('methodName');
    }
}
