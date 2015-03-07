<?php

namespace spec\NullDev\Nemesis\TargetTestGenerators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasicUnitTestGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaData $sourceMeta
     * @param NullDev\Nemesis\Target\TestMetaData  $targetMeta
     */
    public function let($sourceMeta, $targetMeta)
    {
        $this->beConstructedWith($sourceMeta, $targetMeta);
    }

    public function it_should_know_which_template_is_used()
    {
        $this->getTemplateName()->shouldReturn('BasicUnitTest');
    }

    public function it_should_know_target_namespace($targetMeta)
    {
        $targetMeta
            ->getClassName()
            ->shouldBeCalled()
            ->willReturn('SomeClassTest');

        $targetMeta
            ->getFullyQualifiedClassName()
            ->shouldBeCalled()
            ->willReturn('Vendor\SomeBundle\Tests\Unit\Package\Namespace\SomeClassTest');

        $this->getTargetNamespace()->shouldReturn('Vendor\SomeBundle\Tests\Unit\Package\Namespace');
    }

    public function it_should_know_classes_to_import($sourceMeta)
    {
        $sourceMeta
            ->getFullyQualifiedClassName()
            ->shouldBeCalled()
            ->willReturn('Vendor\SomeBundle\Package\Namespace\SomeClass');

        $expected = [
            'Vendor\SomeBundle\Package\Namespace\SomeClass',
            'Mockery as m',
        ];

        $this->getImports()->shouldReturn($expected);
    }

    public function it_should_know_target_class_name($targetMeta)
    {
        $targetMeta
            ->getClassName()
            ->shouldBeCalled()
            ->willReturn('SomeClassTest');

        $this->getTargetClassName()->shouldReturn('SomeClassTest');
    }

    public function it_should_know_source_class_name($sourceMeta)
    {
        $sourceMeta
            ->getClassName()
            ->shouldBeCalled()
            ->willReturn('SomeClass');

        $this->getSourceClassName()->shouldReturn('SomeClass');
    }
}
