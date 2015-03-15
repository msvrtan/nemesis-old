<?php

namespace NullDev\Nemesis\Target\Property;

use NullDev\Nemesis\Target\Property\PropertyItem;

class PropertyCollection
{
    protected $list = [];

    /**
     * @param PropertyItem $item
     *
     * @return $this
     */
    public function add(PropertyItem $item)
    {
        $this->list[] = $item;

        return $this;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->list;
    }
}
