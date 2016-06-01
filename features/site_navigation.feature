Feature: Site Navigation
  In order to learn about the Company and its Product
  As a website visitor
  I should be able to navigate around the site

  Background:
    Given I am on "/"

  Scenario: Landing page loads
     Then I should see "How people build software"

  Scenario Outline: Landing page navigation
     When I follow "<link>"
     Then I should be on "<destination>"

    Examples:
      | link        | destination    |
      | Personal    | /personal      |
      | Open source | /open-source   |
      | Business    | /business      |
      | Explore     | /explore       |
