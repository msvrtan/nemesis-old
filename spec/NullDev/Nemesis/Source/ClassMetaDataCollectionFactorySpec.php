<?php

namespace spec\NullDev\Nemesis\Source;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassMetaDataCollectionFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Source\ClassMetaDataCollectionFactory');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaDataCollection $sourceMeta
     */
    public function it_should_create_empty_instance($sourceMeta)
    {
        $this->create($sourceMeta)->shouldReturnAnInstanceOf('NullDev\Nemesis\Source\ClassMetaDataCollection');
    }
}
