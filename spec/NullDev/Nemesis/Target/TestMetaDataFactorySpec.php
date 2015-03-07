<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestMetaDataFactory');
    }

    /**
     * @param NullDev\Nemesis\Target\TestMetaData $sourceMeta
     */
    public function it_should_create_empty_instance($sourceMeta)
    {
        $this->create($sourceMeta)->shouldReturnAnInstanceOf('NullDev\Nemesis\Target\TestMetaData');
    }
}
