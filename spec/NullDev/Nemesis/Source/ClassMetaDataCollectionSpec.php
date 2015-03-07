<?php

namespace spec\NullDev\Nemesis\Source;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassMetaDataCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Source\ClassMetaDataCollection');
    }

    /**
     * @param NullDev\Nemesis\Source\ClassMetaData $item
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
