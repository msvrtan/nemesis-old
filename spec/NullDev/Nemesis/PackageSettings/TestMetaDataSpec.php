<?php

namespace spec\NullDev\Nemesis\PackageSettings;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\PackageSettings\TestMetaData');
    }

    public function it_should_hold_root_path()
    {
        $this->setRootPath('path');
        $this->getRootPath()->shouldReturn('path');
    }

    public function it_should_know_namespace_of_root_path()
    {
        $this->setRootNamespace('Vendor\PackageBundle');
        $this->getRootNamespace()->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_now_if_it_is_enabled()
    {
        $this->isEnabled()->shouldReturn(true);
        $this->disable();
        $this->isEnabled()->shouldReturn(false);
        $this->enable();
        $this->isEnabled()->shouldReturn(true);
    }
}
