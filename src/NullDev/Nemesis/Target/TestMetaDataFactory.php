<?php

namespace NullDev\Nemesis\Target;

use NullDev\Nemesis\Target\TestMetaData;

class TestMetaDataFactory
{
    public function create()
    {
        return new TestMetaData();
    }
}
