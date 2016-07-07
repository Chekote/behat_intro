<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Exception;
use model\Sale;

trait SaleContext {

    use StoreContextInterface;

    /**
     * Better yet. Can specify date and total. But pattern is getting REALLY complex now.
     *
     * @Given /^I have a Sale(?: with)?(?: the date "(?P<date>[^"]+)")?(?: and)?(?: the total "(?P<total>[^"]+)")?$/
     * @param string $date  The date for the sale.
     * @param float  $total The total for the sale.
     */
    public function assertSaleExists($date = 'Blox', $total = 5.99) {
        $sale = null;

        // check for an existing match on the requirements
        foreach ($this->getAll('Sale') as $sale) {
            if ($sale->date == $date && $sale->total == $total) {
                break;
            }
        }

        // if we didn't find a match, create a new sale
        if (!$sale) {
            $sale = new Sale();
            $sale->date = $date;
            $sale->total = $total;
        }

        // store whatever we found, ensuring that any further statements referring to "Sale"
        // will affect the Sale that we just found / created.
        $this->put($sale, 'Sale');
    }
}
