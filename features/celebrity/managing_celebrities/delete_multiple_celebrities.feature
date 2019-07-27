@managing_celebrities
Feature: Deleting multiple celebrities
    In order to get rid of spam celebrities in an efficient way
    As an Administrator
    I want to be able to delete multiple celebrities at once

    Background:
        Given there is a celebrity Stephen King
        And there is also a celebrity Tom Cruise
        And there is also a celebrity Steve Vai
        And I am logged in as an administrator

    @ui @javascript
    Scenario: Deleting multiple celebrities at once
        Given I browse celebrities
        And I check the Stephen King celebrity
        And I also check the Tom Cruise celebrity
        And I delete them
        Then I should be notified that they have been successfully deleted
        And I should see a single celebrity in the list
        And I should see the celebrity Steve Vai in the list
