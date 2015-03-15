<?php

namespace NullDev\Nemesis\Target\Method;

use NullDev\Nemesis\Target\Method\MethodItem;

class MethodCollection
{
    protected $list = [];

    /**
     * @param MethodItem $item
     *
     * @return $this
     */
    public function add(MethodItem $item)
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
