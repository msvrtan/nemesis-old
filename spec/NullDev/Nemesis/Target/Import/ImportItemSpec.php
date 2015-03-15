<?php

namespace spec\NullDev\Nemesis\Target\Import;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImportItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Import\ImportItem');
    }

    public function let()
    {
        $this->beConstructedWith('ClassName', 'ClassAlias');
    }

    public function it_should_allow_access_to_class_name()
    {
        $this->beConstructedWith('ClassName');

        $this->getClassName()->shouldReturn('ClassName');
    }

    public function it_should_allow_access_to_class_alias()
    {
        $this->beConstructedWith('ClassName', 'ClassAlias');

        $this->getClassAlias()->shouldReturn('ClassAlias');
    }

    public function it_should_return_false_cause_class_has_no_alias()
    {
        $this->beConstructedWith('ClassName');
        $this->hasClassAlias()->shouldReturn(false);
    }

    public function it_should_return_true_cause_class_has_alias()
    {
        $this->beConstructedWith('ClassName', 'ClassAlias');
        $this->hasClassAlias()->shouldReturn(true);
    }
}
