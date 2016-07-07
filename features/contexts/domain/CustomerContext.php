<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Exception;
use model\Customer;

trait CustomerContext {

    use StoreContextInterface;

    /**
     * Better yet. Can specify name and age. But pattern is getting REALLY complex now.
     *
     * @Given /^I have a Customer(?: with)?(?: the name "(?P<name>[^"]+)")?(?: and)?(?: the age "(?P<age>[^"]+)")?$/
     * @param string $name  The name of the Customer.
     * @param int    $age   The age of the Customer.
     */
    public function assertCustomerExists($name = 'Fred', $age = 21) {
        $Customer = null;

        // check for an existing match on the requirements
        foreach ($this->getAll('Customer') as $Customer) {
            if ($Customer->name == $name && $Customer->age == $age) {
                break;
            }
        }

        // if we didn't find a match, create a new Customer
        if (!$Customer) {
            $Customer = new Customer();
            $Customer->name = $name;
            $Customer->age = $age;
        }

        // store whatever we found, ensuring that any further statements referring to "Customer"
        // will affect the Customer that we just found / created.
        $this->put($Customer, 'Customer');
    }
}
