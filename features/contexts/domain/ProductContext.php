<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Exception;
use model\Product;

trait ProductContext {

    use StoreContextInterface;

    /**
     * Better method. Can specify name. But pattern is getting complex now.
     * Also, we can end up with more products than we need, because there
     * might already be a product matching the requirements.
     *
     * @Given /^I have a Product(?: with)?(?: the name "(?P<name>[^"]+)")?$/
     * @param string $name The name for the product.
     */
    public function assertProductExists($name = 'Blox') {
        $product = new Product();
        $product->name = $name;

        $this->put($product, 'Product');
    }

    /**
     * {@inheritdoc}
     *
     * @Then the Product should have the name :name
     */
    public function assertProductName($name) {
        if ($name != $this->getThingProperty('Product', 'name')) {
            throw new Exception('Property did not match');
        }
    }
}
