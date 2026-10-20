<?php

namespace eiriksm\DttAutoScreenshotOnFail;

trait TriggerScreeshotOnTearDownTrait
{

    public function saveScreenshotIfTestFailed() : void
    {
        if ($this->testHasFailed()) {
            $this->captureScreenshot();
            $this->capturePageContent();
        }
    }

    protected function testHasFailed() : bool
    {
        // For phpunit <= 9:
        if (method_exists($this, 'hasFailed')) {
            return (bool) $this->hasFailed();
        }
        // For phpunit >= 10:
        if (!method_exists($this, 'status')) {
            return false;
        }
        $status = $this->status();
        if (!is_object($status) || !method_exists($status, 'isFailure') || !method_exists($status, 'isError')) {
            return false;
        }
        return $status->isFailure() || $status->isError();
    }
}
