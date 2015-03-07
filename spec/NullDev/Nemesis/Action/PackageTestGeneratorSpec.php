<?php

namespace spec\NullDev\Nemesis\Action;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PackageTestGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Action\PackageTestGenerator');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator $sourceCollectionGenerator
     * @param NullDev\Nemesis\Target\TestMetaDataCollectionGenerator  $testCollectionGenerator
     * @param NullDev\Nemesis\PackageSettings\Settings                $settings
     */
    public function let($sourceCollectionGenerator, $testCollectionGenerator, $settings)
    {
        $this->beConstructedWith($sourceCollectionGenerator, $testCollectionGenerator, $settings);
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator $sourceCollectionGenerator
     * @param NullDev\Nemesis\Target\TestMetaDataCollectionGenerator  $testCollectionGenerator
     * @param NullDev\Nemesis\PackageSettings\Settings                $settings
     * @param NullDev\Nemesis\Source\ClassMetaDataCollection          $sourceCollection
     * @param NullDev\Nemesis\Target\TestMetaDataCollection           $testCollection
     */
    public function it_should_do_some_work(
        $sourceCollectionGenerator,
        $testCollectionGenerator,
        $settings,
        $sourceCollection,
        $testCollection
    ) {
        $sourceCollectionGenerator
            ->generate($settings)
            ->shouldBeCalled()
            ->willReturn($sourceCollection);

        $testCollectionGenerator
            ->generate($settings, $sourceCollection)
            ->shouldBeCalled()
            ->willReturn($testCollection);

        $this->runAction()->shouldReturn($testCollection);
    }
}
