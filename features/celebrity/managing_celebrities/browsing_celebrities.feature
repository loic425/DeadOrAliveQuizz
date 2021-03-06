@managing_celebrities
Feature: Browsing celebrities
    In order to manage celebrities in the website
    As an Administrator
    I want to browse celebrities

    Background:
        Given there is a celebrity Stephen King
        And there is also a celebrity Tom Cruise
        And there is also a celebrity Steve Vai
        And I am logged in as an administrator

    @ui
    Scenario: Browsing celebrities in the website
        When I want to browse celebrities
        Then there should be 3 celebrities in the list
        And I should see the celebrity Stephen King in the list
        And I should also see the celebrity Tom Cruise in the list
        And I should also see the celebrity Steve Vai in the list
