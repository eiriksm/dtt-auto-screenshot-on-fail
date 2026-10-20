<?php

namespace eiriksm\DttAutoScreenshotOnFail;

trait TriggerScreeshotOnTearDownTrait
{

    public function saveScreenshotIfTestFailed() : void
    {
        if (method_exists($this, 'hasFailed')) {
            // For phpunit <= 9:
            $has_failed = $this->hasFailed();
        } else {
            // For phpunit >= 10:
            $has_failed = $this->status()->isFailure() || $this->status()->isError();
        }
        if ($has_failed) {
            $this->captureScreenshot();
            $this->capturePageContent();
        }
    }
}
