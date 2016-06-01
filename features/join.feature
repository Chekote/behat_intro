Feature: Join
  In order to use the service
  As a potential user
  I should be able to join the site

  Background:
    Given I am on "/join"

  @javascript
  Scenario: Username is taken
     When I fill in "Username" with "Chekote"
     Then I should see "Username is already taken"
