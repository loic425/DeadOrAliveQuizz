@managing_themes
Feature: Adding a new theme
    In order to extend themes database
    As an Administrator
    I want to add a new theme

    Background:
        Given the website has locale "en_US"
        And I am logged in as an administrator

    @ui
    Scenario: Adding a new theme
        Given I want to create a new theme
        When I name it "Cinema"
        And I add it
        Then I should be notified that it has been successfully created
        And the theme Cinema should appear in the website
