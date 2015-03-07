<?php

namespace spec\NullDev\Nemesis\Source;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassMetaDataFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Source\ClassMetaDataFactory');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaData $sourceMeta
     */
    public function it_should_create_empty_instance($sourceMeta)
    {
        $this->create($sourceMeta)->shouldReturnAnInstanceOf('NullDev\Nemesis\Source\ClassMetaData');
    }
}
