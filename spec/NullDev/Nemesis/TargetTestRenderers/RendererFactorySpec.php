<?php

namespace spec\NullDev\Nemesis\TargetTestRenderers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RendererFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetTestRenderers\RendererFactory');
    }

    /**
     * @param NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator $targetGenerator
     */
    public function it_should_create_simple_renderer($targetGenerator)
    {
        $this->createSimpleRenderer($targetGenerator)->shouldReturnAnInstanceOf('NullDev\Nemesis\TargetTestRenderers\SimpleRenderer');
    }
}
