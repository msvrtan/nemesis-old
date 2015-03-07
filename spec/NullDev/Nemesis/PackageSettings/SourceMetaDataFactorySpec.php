<?php

namespace spec\NullDev\Nemesis\PackageSettings;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\PackageSettings\SourceMetaDataFactory');
    }

    public function it_should_create_empty_instance()
    {
        $this->create()->shouldReturnAnInstanceOf('NullDev\Nemesis\PackageSettings\SourceMetaData');
    }
}
