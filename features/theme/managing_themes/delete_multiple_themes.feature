@managing_themes
Feature: Deleting multiple themes
    In order to get rid of spam themes in an efficient way
    As an Administrator
    I want to be able to delete multiple themes at once

    Background:
        Given there is a theme Cinema
        And there is also a theme Theater
        And there is also a theme "Tv-Show"
        And I am logged in as an administrator

    @ui @javascript
    Scenario: Deleting multiple themes at once
        Given I browse themes
        And I check the Cinema theme
        And I also check the Theater theme
        And I delete them
        Then I should be notified that they have been successfully deleted
        And I should see a single theme in the list
        And I should see the theme "Tv-Show" in the list
