<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestMetaData');
    }

    public function it_should_have_source_file_path()
    {
        $this->getFilePath();
        $this->setFilePath('path/filename.php');
    }

    public function it_should_have_source_class_name()
    {
        $this->setClassName('SomeClass');
        $this->getClassName()->shouldReturn('SomeClass');
    }

    public function it_should_have_source_fully_qualified_class_name()
    {
        $this->setFullyQualifiedClassName('Vendor\Package\SomeClass');
        $this->getFullyQualifiedClassName()->shouldReturn('Vendor\Package\SomeClass');
    }
}
