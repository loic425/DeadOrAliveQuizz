@managing_celebrities
Feature: Adding a new celebrity
    In order to extend celebrities database
    As an Administrator
    I want to add a new celebrity

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Adding a new celebrity
        Given I want to create a new celebrity
        When I specify its first name as "Stephen"
        And I specify its last name as "King"
        And I add it
        Then I should be notified that it has been successfully created
        And the celebrity Stephen King should appear in the website
