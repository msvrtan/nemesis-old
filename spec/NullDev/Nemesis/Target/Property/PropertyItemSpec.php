<?php

namespace spec\NullDev\Nemesis\Target\Property;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertyItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Property\PropertyItem');
    }

    public function let()
    {
        $this->beConstructedWith('propertyName');
    }

    public function it_should_support_property_visibility()
    {
        $this->setVisibility('public');
        $this->getVisibility()->shouldReturn('public');
    }

    public function it_has_protected_as_default_visiblity()
    {
        $this->getVisibility()->shouldReturn('protected');
    }

    public function it_should_support_property_name()
    {
        $this->setName('name');
        $this->getName()->shouldReturn('name');
    }

    public function it_should_support_default_value()
    {
        $this->setDefaultValue('default-value');
        $this->getDefaultValue()->shouldReturn('default-value');
    }
}
