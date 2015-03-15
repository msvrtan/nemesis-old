<?php

namespace spec\NullDev\Nemesis\Target\Property;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertyCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Property\PropertyCollection');
    }

    /**
     * @param NullDev\Nemesis\Target\Property\PropertyItem $item
     */
    public function it_should_allow_adding_new_item_into_collection($item)
    {
        $this->add($item);
    }

    /**
     */
    public function it_should_return_all_items_in_collection()
    {
        $this->getAll();
    }
}
