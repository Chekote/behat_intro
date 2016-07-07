<?php namespace contexts\domain;

use Behat\FlexibleMink\PseudoInterface\StoreContextInterface;
use Exception;
use model\Location;

trait LocationContext {

    use StoreContextInterface;

    /**
     * Better yet. Can specify street and city. But pattern is getting REALLY complex now.
     *
     * @Given /^I have a Location(?: with)?(?: the street "(?P<street>[^"]+)")?(?: and)?(?: the city "(?P<city>[^"]+)")?$/
     * @param string $street  The street of the Location.
     * @param int    $city   The city of the Location.
     */
    public function assertLocationExists($street = 'Somewhere Road', $city = 'Houston') {
        $Location = null;

        // check for an existing match on the requirements
        foreach ($this->getAll('Location') as $Location) {
            if ($Location->street == $street && $Location->city == $city) {
                break;
            }
        }

        // if we didn't find a match, create a new Location
        if (!$Location) {
            $Location = new Location();
            $Location->street = $street;
            $Location->city = $city;
        }

        // store whatever we found, ensuring that any further statements referring to "Location"
        // will affect the Location that we just found / created.
        $this->put($Location, 'Location');
    }
}
