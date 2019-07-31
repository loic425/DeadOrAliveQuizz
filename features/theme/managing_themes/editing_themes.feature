@managing_themes
Feature: Editing theme
    In order to change theme details
    As an Administrator
    I want to be able to edit an theme

    Background:
        Given the website has locale "en_US"
        And there is a theme Cinema
        And I am logged in as an administrator

    @ui
    Scenario: Renaming the theme
        Given I want to modify the Cinema theme
        When I rename it to Movies
        And I save my changes
        Then I should be notified that it has been successfully edited
        And I should see the theme Movies in the list
        But there should not be Cinema theme anymore
