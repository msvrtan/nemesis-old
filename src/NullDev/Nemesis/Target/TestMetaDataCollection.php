<?php

namespace NullDev\Nemesis\Target;

use NullDev\Nemesis\Target\TestMetaData;

class TestMetaDataCollection
{
    protected $list = [];

    /**
     * @param TestMetaData $item
     *
     * @return $this
     */
    public function add(TestMetaData $item)
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
