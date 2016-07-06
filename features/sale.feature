Feature: Sale
  In order to gain some benefit
  As an actor in the system
  I should be able to perform an action that furthers the goal

  Scenario: Sale!
    Given I have a Sale
     Then the store should contain something under key "Sale"

  Scenario: Sale with date
    Given I have a Sale with the date "2016-01-01"
     Then the store should contain something under key "Sale"
      And the Sale should have the date "2016-01-01"

  Scenario: Sale with total
    Given I have a Sale with the total "1.99"
     Then the store should contain something under key "Sale"
      And the Sale should have the total "1.99"

  Scenario: Sale with date *and* total. ooooooooh fancy!
    Given I have a Sale with the date "2016-02-02" and the total "150.00"
     Then the store should contain something under key "Sale"
      And the Sale should have the date "2016-02-02"
      And the Sale should have the total "150.00"

  Scenario: Don't create unecessary duplicates!
    Given I have a Sale with the date "2016-02-02" and the total "150.00"
      And I have a Sale with the date "2016-02-02" and the total "150.00"
     Then the store should contain "1" unique "Sale"
