<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataCollectionFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestMetaDataCollectionFactory');
    }
    /**
     */
    public function it_should_create_empty_instance()
    {
        $this->create()->shouldReturnAnInstanceOf('NullDev\Nemesis\Target\TestMetaDataCollection');
    }
}
