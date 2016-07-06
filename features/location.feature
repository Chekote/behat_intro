Feature: Location
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Location!
    Given I have a Location
     Then the store should contain something under key "Location"

  Scenario: Location with street
    Given I have a Location with the street "Nowhere Road"
     Then the store should contain something under key "Location"
      And the Location should have the street "Nowhere Road"

  Scenario: Location with city
    Given I have a Location with the city "1.99"
     Then the store should contain something under key "Location"
      And the Location should have the city "1.99"

  Scenario: Location with street *and* city. ooooooooh fancy!
    Given I have a Location with the street "I don't Know Avenue" and the city "LaGrange"
     Then the store should contain something under key "Location"
      And the Location should have the street "I don't Know Avenue"
      And the Location should have the city "LaGrange"

  Scenario: Don't create unecessary duplicates!
    Given I have a Location with the street "I don't Know Avenue" and the city "LaGrange"
      And I have a Location with the street "I don't Know Avenue" and the city "LaGrange"
     Then the store should contain "1" unique "Location"
