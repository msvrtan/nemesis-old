<?php

namespace spec\NullDev\Nemesis\PackageSettings;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\PackageSettings\SourceMetaData');
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

    public function it_should_hold_list_of_folders_to_exclude()
    {
        $this->getExcludeFolders()->shouldReturn([]);
        $this->setExcludeFolders(['item1']);
        $this->getExcludeFolders()->shouldReturn(['item1']);
    }

    public function it_should_allow_adding_folders_to_list_of_excluded_folders()
    {
        $this->getExcludeFolders()->shouldReturn([]);
        $this->addExcludeFolders('item2');
        $this->getExcludeFolders()->shouldReturn(['item2']);
    }
}
