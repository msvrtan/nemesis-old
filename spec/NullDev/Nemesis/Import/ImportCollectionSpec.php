<?php

namespace spec\NullDev\Nemesis\Import;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImportCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Import\ImportCollection');
    }

    /**
     */
    public function it_should_allow_adding_new_class_without_alias_directly()
    {
        $this->getAll()->shouldHaveCount(0);
        $this->addClass('ClassName');
        $this->getAll()->shouldHaveCount(1);
    }

    /**
     */
    public function it_should_allow_adding_new_class_with_alias_directly()
    {
        $this->getAll()->shouldHaveCount(0);
        $this->addClass('ClassName', 'ClassAlias');
        $this->getAll()->shouldHaveCount(1);
    }

    /**
     * @param NullDev\Nemesis\Import\ImportItem $item
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

    /**
     * @param NullDev\Nemesis\Import\ImportItem $item1
     */
    public function it_should_render_collection_without_alias($item1)
    {
        $item1->getClassName()->shouldBeCalled()->willReturn('Vendor\Package\Namespace\ClassName');
        $item1->hasClassAlias()->shouldBeCalled()->willReturn(false);

        $this->add($item1);

        $this->render()->shouldReturn('use Vendor\Package\Namespace\ClassName;');
    }

    /**
     * @param NullDev\Nemesis\Import\ImportItem $item1
     */
    public function it_should_render_collection_with_alias($item1)
    {
        $item1->getClassName()->shouldBeCalled()->willReturn('Vendor\Package\Namespace\ClassName');
        $item1->hasClassAlias()->shouldBeCalled()->willReturn(true);
        $item1->getClassAlias()->shouldBeCalled()->willReturn('ClassAlias');
        $this->add($item1);

        $this->render()->shouldReturn('use Vendor\Package\Namespace\ClassName as ClassAlias;');
    }

    /**
     * @param NullDev\Nemesis\Import\ImportItem $item1
     * @param NullDev\Nemesis\Import\ImportItem $item2
     */
    public function it_should_render_collection_with_multiple_items_in($item1, $item2)
    {
        $item1->getClassName()->shouldBeCalled()->willReturn('Vendor\Package\Namespace\ClassName');
        $item1->hasClassAlias()->shouldBeCalled()->willReturn(true);
        $item1->getClassAlias()->shouldBeCalled()->willReturn('ClassAlias');

        $item2->getClassName()->shouldBeCalled()->willReturn('Vendor\Package\Namespace\OtherClassName');
        $item2->hasClassAlias()->shouldBeCalled()->willReturn(true);
        $item2->getClassAlias()->shouldBeCalled()->willReturn('OtherClassAlias');

        $this->add($item1);
        $this->add($item2);

        $expected = 'use Vendor\Package\Namespace\ClassName as ClassAlias;'.
            PHP_EOL
            .'use Vendor\Package\Namespace\OtherClassName as OtherClassAlias;';

        $this->render()->shouldReturn($expected);
    }
}
