<?php

namespace eiriksm\DttAutoScreenshotOnFail;

use weitzman\DrupalTestTraits\ExistingSiteSelenium2DriverTestBase;
use weitzman\DrupalTestTraits\ScreenShotTrait;

class AutoScreenshotOnFailTestBase extends ExistingSiteSelenium2DriverTestBase
{

    use ScreenShotTrait;
    use TriggerScreeshotOnTearDownTrait;

  /**
   * {@inheritdoc}
   */
    public function tearDown(): void
    {
        $this->saveScreenshotIfTestFailed();
        parent::tearDown();
    }
}
