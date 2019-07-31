@managing_themes
Feature: themes validation
    In order to avoid making mistakes when managing themes
    As an Administrator
    I want to be prevented from adding it without specifying required fields

    Background:
        Given the website has locale "en_US"
        And I am logged in as an administrator

    @ui
    Scenario: Trying to add a new theme without first name
        Given I want to create a new theme
        When I do not specify its name
        And I try to add it
        Then I should be notified that the name is required
        And this theme should not be added
