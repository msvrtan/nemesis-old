<?php

namespace NullDev\Nemesis\Target\Import;

use NullDev\Nemesis\Target\Import\ImportCollection;

class ImportCollectionFactory
{
    public function create()
    {
        return new ImportCollection();
    }
}
