Feature: Default outdated headband

  Background:
    Given I load default datafixture

  Scenario: I see headband outdated
    Given I am on homepage
    Then I should see "Votre navigateur est désuet!"