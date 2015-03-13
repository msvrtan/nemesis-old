<?php

namespace spec\NullDev\Nemesis\TargetTestRenderers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator;

class SimpleRendererSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetTestRenderers\SimpleRenderer');
    }

    /**
     * @param NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator $targetGenerator
     */
    public function let($targetGenerator)
    {
        $this->beConstructedWith($targetGenerator);
    }

    public function it_should_return_path_to_template_used($targetGenerator)
    {
        $targetGenerator->getTemplateName()->willReturn('BasicUnitTest');
        $this->getTemplatePath();
    }

    public function it_should_render_generated_test_class($targetGenerator)
    {
        $vars = [
            'targetNamespace' => 'Vendor\SomeBundle\Tests\Unit\Package\Namespace',
            'imports'         => 'use Vendor\SomeBundle\Package\Namespace\SomeClass;'.PHP_EOL.'use Mockery as m;',
            'targetClassName' => 'SomeClassTest',
            'sourceClassName' => 'SomeClass',
        ];

        $targetGenerator->getVars()->willReturn($vars);
        $targetGenerator->getTemplateName()->willReturn('BasicUnitTest');
        $this->render();
    }
}
