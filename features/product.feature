Feature: Product
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Product!
    Given I have a Product
     Then the store should contain something under key "Product"
