<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Exception;
use model\Product;

trait ProductContext {

    use StoreContextInterface;

    /**
     * Better yet. Can specify name and price. But pattern is getting REALLY complex now.
     *
     * @Given /^I have a Product(?: with)?(?: the name "(?P<name>[^"]+)")?(?: and)?(?: the price "(?P<price>[^"]+)")?$/
     * @param string $name  The name for the product.
     * @param float  $price The price for the product.
     */
    public function assertProductExists($name = 'Blox', $price = 5.99) {
        $product = null;

        // check for an existing match on the requirements
        foreach ($this->getAll('Product') as $product) {
            if ($product->name == $name && $product->price == $price) {
                break;
            }
        }

        // if we didn't find a match, create a new product
        if (!$product) {
            $product = new Product();
            $product->name = $name;
            $product->price = $price;
        }

        // store whatever we found, ensuring that any further statements referring to "Product"
        // will affect the Product that we just found / created.
        $this->put($product, 'Product');
    }
}
