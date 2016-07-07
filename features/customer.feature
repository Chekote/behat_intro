Feature: Customer
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Customer!
    Given I have a "model\Customer"
     Then the store should contain something under key "model\Customer"

  Scenario: Customer with name
    Given I have a "model\Customer" with the following properties:
      | name | Blotch |
     Then the store should contain something under key "model\Customer"
      And the "model\Customer" should have the "name" "Blotch"

  Scenario: Customer with age
    Given I have a "model\Customer" with the following properties:
      | age | 50 |
     Then the store should contain something under key "model\Customer"
      And the "model\Customer" should have the "age" "50"

  Scenario: Customer with name *and* age. ooooooooh fancy!
    Given I have a "model\Customer" with the following properties:
      | age  | 27     |
      | name | Falvie |
     Then the store should contain something under key "model\Customer"
      And the "model\Customer" should have the "name" "Falvie"
      And the "model\Customer" should have the "age" "27"

  Scenario: Don't create unecessary duplicates!
    Given I have a "model\Customer" with the following properties:
      | age  | 27     |
      | name | Falvie |
      And I have a "model\Customer" with the following properties:
      | age  | 27     |
      | name | Falvie |
     Then the store should contain "1" unique "model\Customer"
