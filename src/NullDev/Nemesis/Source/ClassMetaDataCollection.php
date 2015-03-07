<?php

namespace NullDev\Nemesis\Source;

use NullDev\Nemesis\Source\ClassMetaData;

class ClassMetaDataCollection
{
    protected $list = [];

    /**
     * @param ClassMetaData $item
     *
     * @return $this
     */
    public function add(ClassMetaData $item)
    {
        $this->list[] = $item;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->list;
    }
}
