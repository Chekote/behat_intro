Feature: Location
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Location!
    Given I have a "model\Location"
     Then the store should contain something under key "model\Location"

  Scenario: Location with street
    Given I have a "model\Location" with the following properties:
      | street | Nowhere Road |
     Then the store should contain something under key "model\Location"
      And the "model\Location" should have the "street" "Nowhere Road"

  Scenario: Location with city
    Given I have a "model\Location" with the following properties:
      | city | BoopVille |
     Then the store should contain something under key "model\Location"
      And the "model\Location" should have the "city" "BoopVille"

  Scenario: Location with street *and* city. ooooooooh fancy!
    Given I have a "model\Location" with the following properties:
      | street | I don't Know Avenue |
      | city   | LaGrange            |
     Then the store should contain something under key "model\Location"
      And the "model\Location" should have the street "I don't Know Avenue"
      And the "model\Location" should have the city "LaGrange"

  Scenario: Don't create unecessary duplicates!
    Given I have a "model\Location" with the following properties:
      | street | I don't Know Avenue |
      | city   | LaGrange            |
      And I have a "model\Location" with the following properties:
      | street | I don't Know Avenue |
      | city   | LaGrange            |
     Then the store should contain "1" unique "model\Location"
