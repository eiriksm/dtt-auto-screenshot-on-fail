<?php

namespace eiriksm\DttAutoScreenshotOnFail;

trait TriggerScreeshotOnTearDownTrait {

  public function saveScreenshotIfTestFailed()
  {
    // For phpunit <= 9:
    if (method_exists($this, 'hasFailed')) {
      if ($this->hasFailed()) {
        $this->captureScreenshot();
        $this->capturePageContent();
      }
    }
  }

}