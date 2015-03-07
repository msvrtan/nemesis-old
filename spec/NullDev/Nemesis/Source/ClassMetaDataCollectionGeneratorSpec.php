<?php

namespace spec\NullDev\Nemesis\Source;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassMetaDataCollectionGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaDataCollectionFactory $factory
     * @param Symfony\Component\Finder\Finder                       $finder
     * @param NullDev\Nemesis\Source\ClassMetaDataGenerator         $sourceMetaGenerator
     */
    public function let($factory, $finder, $sourceMetaGenerator)
    {
        $this->beConstructedWith($factory, $finder, $sourceMetaGenerator);
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaDataCollectionFactory $factory
     * @param Symfony\Component\Finder\Finder                       $finder
     * @param NullDev\Nemesis\Source\ClassMetaDataGenerator         $sourceMetaGenerator
     * @param NullDev\Nemesis\PackageSettings\Settings              $settings
     * @param NullDev\Nemesis\Source\ClassMetaDataCollection        $collection
     * @param NullDev\Nemesis\PackageSettings\SourceMetaData        $packageSourceMeta
     * @param NullDev\Nemesis\Source\ClassMetaData                  $classSourceMeta
     */
    public function it_should_generate_collection_from_given_package_settings(
        $factory,
        $finder,
        $sourceMetaGenerator,
        $settings,
        $collection,
        $packageSourceMeta,
        $classSourceMeta
    ) {
        $packageSourceMeta->getRootPath()->willReturn('/path');
        $packageSourceMeta->getExcludeFolders()->willReturn(['z']);

        $settings->getSourceCode()->willReturn($packageSourceMeta);

        $finder->files()
            ->shouldBeCalled()
            ->willReturn($finder);
        $finder->name('*.php')
            ->shouldBeCalled()
            ->willReturn($finder);
        $finder->in('/path')
            ->shouldBeCalled()
            ->willReturn($finder);
        $finder->exclude(['z'])
            ->shouldBeCalled()
            ->willReturn(['path-to-file1.php']);

        $sourceMetaGenerator->generate('path-to-file1.php')->shouldBeCalled()->willReturn($classSourceMeta);

        $collection->add($classSourceMeta)->shouldBeCalled();

        $factory->create()->shouldBeCalled()->willReturn($collection);
        $this->generate($settings)->shouldReturnAnInstanceOf('NullDev\Nemesis\Source\ClassMetaDataCollection');
    }
}
