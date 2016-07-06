<?php

use Behat\FlexibleMink\Context\FlexibleContext;
use Behat\FlexibleMink\Context\StoreContext;
use contexts\domain\CustomerContext;
use contexts\domain\ProductContext;

/**
 * Defines step implementations from the context of a Web Page.
 */
class FeatureContext extends FlexibleContext {

    use CustomerContext;
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

    /**
     * @Then the store should contain :count unique :key
     */
    public function assertStoreContainsCount($key, $count) {
        $entries = $this->getAll($key);
        $uniques = [];
        foreach ($entries as $entry) {
            $uniques[] = spl_object_hash($entry);
        }

        $uniques = array_unique($uniques);

        if (($actual = count($uniques)) != $count) {
            throw new Exception("Expected $count $key's, but found $actual");
        }
    }
}
