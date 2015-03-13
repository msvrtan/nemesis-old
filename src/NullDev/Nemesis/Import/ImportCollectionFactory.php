<?php

namespace NullDev\Nemesis\Import;

use NullDev\Nemesis\Import\ImportCollection;

class ImportCollectionFactory
{
    public function create()
    {
        return new ImportCollection();
    }
}
