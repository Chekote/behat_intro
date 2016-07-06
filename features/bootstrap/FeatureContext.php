<?php

use Behat\FlexibleMink\Context\FlexibleContext;
use Behat\FlexibleMink\Context\StoreContext;
use contexts\domain\ProductContext;

/**
 * Defines step implementations from the context of a Web Page.
 */
class FeatureContext extends FlexibleContext {

    use ProductContext;
    use StoreContext;

    /**
     * {@inheritdoc}
     *
     * @Then the store should contain something under key :key
     */
    public function assertIsStored($key, $nth = null) {
        return parent::assertIsStored($key, $nth);
    }
}
