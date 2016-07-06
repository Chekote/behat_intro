Feature: Product
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Product!
    Given I have a Product
     Then the store should contain something under key "Product"

  Scenario: Product with name
    Given I have a Product with the name "Boop Shoops"
     Then the store should contain something under key "Product"
      And the Product should have the name "Boop Shoops"

  Scenario: Product with price
    Given I have a Product with the price "1.99"
     Then the store should contain something under key "Product"
      And the Product should have the price "1.99"

  Scenario: Product with name *and* price. ooooooooh fancy!
    Given I have a Product with the name "Yummy Mints" and the price "0.99"
     Then the store should contain something under key "Product"
      And the Product should have the name "Yummy Mints"
      And the Product should have the price "0.99"

  Scenario: Don't create unecessary duplicates!
    Given I have a Product with the name "Yummy Mints" and the price "0.99"
      And I have a Product with the name "Yummy Mints" and the price "0.99"
     Then the store should contain "1" unique "Product"
