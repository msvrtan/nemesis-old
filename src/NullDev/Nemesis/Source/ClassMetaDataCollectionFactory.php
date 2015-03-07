<?php

namespace NullDev\Nemesis\Source;

use NullDev\Nemesis\Source\ClassMetaDataCollection;

class ClassMetaDataCollectionFactory
{
    public function create()
    {
        return new ClassMetaDataCollection();
    }
}
