<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataCollectionGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestMetaDataCollectionGenerator');
    }

    /**
     * @param NullDev\Nemesis\Target\TestMetaDataCollectionFactory $collectionFactory
     * @param NullDev\Nemesis\Target\TestMetaDataGenerator         $generator
     */
    public function let($collectionFactory, $generator)
    {
        $this->beConstructedWith($collectionFactory, $generator);
    }

    /**
     * @param NullDev\Nemesis\Target\TestMetaDataCollectionFactory $collectionFactory
     * @param NullDev\Nemesis\Target\TestMetaDataGenerator         $generator
     * @param NullDev\Nemesis\Source\ClassMetaDataCollection       $sourceCollection
     * @param NullDev\Nemesis\PackageSettings\Settings             $packageSettings
     * @param NullDev\Nemesis\Source\ClassMetaData                 $sourceMetaData
     * @param NullDev\Nemesis\Target\TestMetaData                  $testMetaData
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData       $packageSourceMeta
     * @param NullDev\Nemesis\PackageSettings\TestMetaData         $packageTestMeta
     * @param NullDev\Nemesis\Target\TestMetaDataCollection        $testCollection
     */
    public function it_should_generate_test_collections(
        $collectionFactory,
        $generator,
        $sourceCollection,
        $packageSettings,
        $sourceMetaData,
        $testMetaData,
        $packageSourceMeta,
        $packageTestMeta,
        $testCollection
    ) {
        $collectionFactory->create()->shouldBeCalled()->willReturn($testCollection);

        $sourceCollection->getAll()->shouldBeCalled()->willReturn([$sourceMetaData]);

        $packageSettings->getSourceCode()->shouldBeCalled()->willReturn($packageSourceMeta);
        $packageSettings->getUnitTest()->shouldBeCalled()->willReturn($packageTestMeta);

        $generator
            ->generate($packageSourceMeta, $packageTestMeta, $sourceMetaData)
            ->shouldBeCalled()
            ->willReturn($testMetaData);
        $testCollection
            ->add($testMetaData)
            ->shouldBeCalled();

        $this->generate($packageSettings, $sourceCollection)->shouldReturn($testCollection);
    }
}
