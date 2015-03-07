<?php

namespace NullDev\Nemesis\PackageSettings;

use NullDev\Nemesis\PackageSettings\SourceMetaData;
use NullDev\Nemesis\PackageSettings\TestMetaData;

class Settings
{
    /**
     * @var SourceMetaData Source code settings object.
     */
    protected $sourceCode;

    /**
     * @var TestMetaData Unit test settings object.
     */
    protected $unitTest;

    /**
     * @var TestMetaData Integration test settings object.
     */
    protected $integrationTest;

    /**
     * @var TestMetaData Functional test settings object.
     */
    protected $functionalTest;

    /**
     * @return Settings
     */
    public function getSourceCode()
    {
        return $this->sourceCode;
    }

    /**
     * @param SourceMetaData $sourceCode
     *
     * @return $this
     */
    public function setSourceCode(SourceMetaData $sourceCode)
    {
        $this->sourceCode = $sourceCode;

        return $this;
    }

    /**
     * @return Settings
     */
    public function getUnitTest()
    {
        return $this->unitTest;
    }

    /**
     * @param TestMetaData $unitTest
     *
     * @return $this
     */
    public function setUnitTest(TestMetaData $unitTest)
    {
        $this->unitTest = $unitTest;

        return $this;
    }

    /**
     * @return Settings
     */
    public function getIntegrationTest()
    {
        return $this->integrationTest;
    }

    /**
     * @param TestMetaData $integrationTest
     *
     * @return $this
     */
    public function setIntegrationTest(TestMetaData $integrationTest)
    {
        $this->integrationTest = $integrationTest;

        return $this;
    }

    /**
     * @return Settings
     */
    public function getFunctionalTest()
    {
        return $this->functionalTest;
    }

    /**
     * @param TestMetaData $functionalTest
     *
     * @return $this
     */
    public function setFunctionalTest(TestMetaData $functionalTest)
    {
        $this->functionalTest = $functionalTest;

        return $this;
    }
}
