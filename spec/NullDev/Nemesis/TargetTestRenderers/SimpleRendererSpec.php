<?php

namespace spec\NullDev\Nemesis\TargetTestRenderers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SimpleRendererSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetTestRenderers\SimpleRenderer');
    }
}
