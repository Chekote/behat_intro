Feature: Location
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Labs are listed on admin page
    Given there is a "model\Country" with the following properties:
      | name | United States |
    And there is a "model\State" with the following properties:
      | name    | Texas |
      | country |       |
    And there is a "model\City" with the following properties:
      | name | Houston |
