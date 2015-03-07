<?php

namespace NullDev\Nemesis\Source;

use NullDev\Nemesis\Source\ClassMetaData;

class ClassMetaDataFactory
{
    public function create()
    {
        return new ClassMetaData();
    }
}
