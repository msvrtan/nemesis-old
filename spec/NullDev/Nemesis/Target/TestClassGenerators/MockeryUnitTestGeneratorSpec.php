<?php

namespace spec\NullDev\Nemesis\Target\TestClassGenerators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MockeryUnitTestGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestClassGenerators\MockeryUnitTestGenerator');
    }

    /**
     * @param NullDev\Nemesis\Target\Results\TestClassResultFactory $testClassResultFactory
     */
    public function let($testClassResultFactory)
    {
        $this->beConstructedWith($testClassResultFactory);
    }

    /**
     * @param NullDev\Nemesis\Target\Results\TestClassResult $testClassResult
     * @param NullDev\Nemesis\Source\ClassMetaData           $sourceMeta
     * @param NullDev\Nemesis\Target\TestMetaData            $targetMeta
     */
    public function it_should_generate_test_result_from_given_source_and_target_meta(
        $testClassResultFactory,
        $testClassResult,
        $sourceMeta,
        $targetMeta
    ) {
        $testClassResultFactory
            ->create()
            ->shouldBeCalled()
            ->willReturn($testClassResult);

        $this
            ->generate($sourceMeta, $targetMeta)
            ->shouldReturnAnInstanceOf('NullDev\Nemesis\Target\Results\TestClassResult');
    }
}
