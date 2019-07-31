@managing_themes
Feature: Browsing themes
    In order to manage themes in the website
    As an Administrator
    I want to browse themes

    Background:
        Given there is a theme Cinema
        And there is also a theme Theater
        And there is also a theme "Tv-Show"
        And I am logged in as an administrator

    @ui
    Scenario: Browsing themes in the website
        When I want to browse themes
        Then there should be 3 themes in the list
        And I should see the theme Cinema in the list
        And I should also see the theme Theater in the list
        And I should also see the theme "Tv-Show" in the list
