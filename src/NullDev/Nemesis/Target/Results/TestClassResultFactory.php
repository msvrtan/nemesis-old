<?php

namespace NullDev\Nemesis\Target\Results;

use NullDev\Nemesis\Target\Results\TestClassResult;

class TestClassResultFactory
{
    /**
     * @return TestClassResult
     */
    public function create()
    {
        return new TestClassResult();
    }
}
