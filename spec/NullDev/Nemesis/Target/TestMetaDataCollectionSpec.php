<?php

namespace spec\NullDev\Nemesis\Target;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestMetaDataCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\TestMetaDataCollection');
    }

    /**
     * @param NullDev\Nemesis\Target\TestMetaData $item
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
