<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use model\Product;

trait ProductContext {

    use StoreContextInterface;

    /**
     * OK method, but not very flexible. I can't specify the property values;
     *
     * @Given I have a Product
     */
    public function assertProductExists() {
        $product = new Product();

        $this->put($product, 'Product');
    }
}
