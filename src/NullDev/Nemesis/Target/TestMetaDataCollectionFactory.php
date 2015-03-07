<?php

namespace NullDev\Nemesis\Target;

use NullDev\Nemesis\Target\TestMetaDataCollection;

class TestMetaDataCollectionFactory
{
    public function create()
    {
        return new TestMetaDataCollection();
    }
}
