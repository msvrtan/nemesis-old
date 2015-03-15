<?php

namespace spec\NullDev\Nemesis\Target\Results;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestClassResultFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Results\TestClassResultFactory');
    }

    public function it_should_create_empty_test_class_result_with_all_dependencies_setup()
    {
        $this->create()->shouldReturnAnInstanceOf('NullDev\Nemesis\Target\Results\TestClassResult');
    }
}
