<?php namespace contexts\domain;

use Exception;

trait EntityContext {

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
