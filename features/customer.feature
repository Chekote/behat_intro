Feature: Customer
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Customer!
    Given I have a Customer
     Then the store should contain something under key "Customer"

  Scenario: Customer with name
    Given I have a Customer with the name "Blotch"
     Then the store should contain something under key "Customer"
      And the Customer should have the name "Blotch"

  Scenario: Customer with age
    Given I have a Customer with the age "50"
     Then the store should contain something under key "Customer"
      And the Customer should have the age "50"

  Scenario: Customer with name *and* age. ooooooooh fancy!
    Given I have a Customer with the name "Falvie" and the age "27"
     Then the store should contain something under key "Customer"
      And the Customer should have the name "Falvie"
      And the Customer should have the age "27"

  Scenario: Don't create unecessary duplicates!
    Given I have a Customer with the name "Falvie" and the age "27"
      And I have a Customer with the name "Falvie" and the age "27"
     Then the store should contain "1" unique "Customer"
