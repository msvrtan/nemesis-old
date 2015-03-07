<?php

namespace spec\NullDev\Nemesis\PackageSettings;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SettingsFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\PackageSettings\SettingsFactory');
    }

    public function it_should_create_empty_instance()
    {
        $this->create()->shouldReturnAnInstanceOf('NullDev\Nemesis\PackageSettings\Settings');
    }
}
