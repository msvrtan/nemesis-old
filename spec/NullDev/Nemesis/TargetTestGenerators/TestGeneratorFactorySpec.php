<?php

namespace spec\NullDev\Nemesis\TargetTestGenerators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestGeneratorFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetTestGenerators\TestGeneratorFactory');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaData $sourceMeta
     * @param NullDev\Nemesis\Target\TestMetaData  $targetMeta
     */
    public function it_should_create_basic_unit_test_generator($sourceMeta, $targetMeta)
    {
        $this
            ->createBasicUnit($sourceMeta, $targetMeta)
            ->shouldReturnAnInstanceOf('NullDev\Nemesis\TargetTestGenerators\BasicUnitTestGenerator');
    }
}
