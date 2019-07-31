@managing_themes
Feature: Deleting an theme
    In order to get rid of deprecated themes
    As an Administrator
    I want to be able to delete themes

    Background:
        Given there is a theme Cinema
        And I am logged in as an administrator

    @ui
    Scenario: Deleting a theme
        Given I want to browse themes
        When I delete theme Cinema
        Then I should be notified that it has been successfully deleted
        And there should not be Cinema theme anymore
