<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Exception;
use model\Product;

trait ProductContext {

    use StoreContextInterface;

    /**
     * Better yet. Can specify name and price. But pattern is getting REALLY complex now.
     * Also, we can *still* end up with more products than we need, because there might
     * already be a product matching the requirements.
     *
     * @Given /^I have a Product(?: with)?(?: the name "(?P<name>[^"]+)")?(?: and)?(?: the price "(?P<price>[^"]+)")?$/
     * @param string $name  The name for the product.
     * @param float  $price The price for the product.
     */
    public function assertProductExists($name = 'Blox', $price = 5.99) {
        $product = new Product();
        $product->name = $name;
        $product->price = $price;

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

    /**
     * {@inheritdoc}
     *
     * @Then the Product should have the price :price
     */
    public function assertProductPrice($price) {
        if ($price != $this->getThingProperty('Product', 'price')) {
            throw new Exception('Price did not match');
        }
    }
}
