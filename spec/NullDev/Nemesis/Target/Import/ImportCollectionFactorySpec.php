<?php

namespace spec\NullDev\Nemesis\Target\Import;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImportCollectionFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Import\ImportCollectionFactory');
    }

    /**
     * @param
     */
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_should_create_new_import_collection()
    {
        $this->create()->shouldReturnAnInstanceOf('NullDev\Nemesis\Target\Import\ImportCollection');
    }
}
