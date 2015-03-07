<?php

namespace spec\NullDev\Nemesis\Action;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Finder\Finder;

class PackageTestGeneratorFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Action\PackageTestGeneratorFactory');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaDataCollectionGenerator $sourceCollectionGenerator
     * @param NullDev\Nemesis\Target\TestMetaDataCollectionGenerator  $testCollectionGenerator
     */
    public function let($sourceCollectionGenerator, $testCollectionGenerator)
    {
        $this->beConstructedWith($sourceCollectionGenerator, $testCollectionGenerator);
    }

    /**
     * @param NullDev\Nemesis\PackageSettings\Settings $settings
     */
    public function it_should_create_empty_instance($settings)
    {
        $this->create($settings)->shouldReturnAnInstanceOf('NullDev\Nemesis\Action\PackageTestGenerator');
    }
}
