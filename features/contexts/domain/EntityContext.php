<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Behat\Gherkin\Node\TableNode;
use Exception;

trait EntityContext {

    use StoreContextInterface;

    /**
     * @Given /^I have a "(?P<class>[^"]+)"(?: with the following properties:)?$/
     * @Given /^there is a "(?P<class>[^"]+)"(?: with the following properties:)?$/
     * @param string    $class The class of the Entity.
     * @param TableNode $table The properties for the Entity.
     */
    public function assertEntityExists($class, TableNode $table = null) {
        $entity = null;

        $attributes = $table ? $table->getRowsHash() : [];

        // check for an existing match on the requirements
        foreach ($this->getAll($class) as $possibleMatch) {
            foreach ($attributes as $key => $value) {
                if (!property_exists($possibleMatch, $key)) {
                    continue;
                }

                if ($possibleMatch->$key != $value) {
                    continue;
                }
            }

            $entity = $possibleMatch;
        }

        // if we didn't find a match, create a new Entity
        if (!$entity) {
            $entity = new $class();

            foreach ($attributes as $key => $value) {
                $entity->$key = $value;
            }
        }

        // store whatever we found, ensuring that any further statements referring to it
        // will affect the Entity that we just found / created.
        $this->put($entity, $class);
    }

    /**
     * @Then the :thing should have the :property :value
     *
     * @param  string    $key      the key of the Object in the store to check.
     * @param  string    $property the name of the Object's property to check.
     * @param  mixed     $value    the expected value of the Object's property.
     * @throws Exception If an object was not found under the specified key.
     * @throws Exception If the object does not have the specified property.
     * @throws Exception if the value of the property did not match the expected value.
     */
    public function assertStoredObjectProperty($key, $property, $value) {
        if ($value != ($actual = $this->getThingProperty($key, $property))) {
            throw new Exception("Expected $key $property to be $value, but found $actual");
        }
    }
}
