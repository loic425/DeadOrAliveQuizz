@managing_celebrities
Feature: Editing celebrity
    In order to change celebrity details
    As an Administrator
    I want to be able to edit an celebrity

    Background:
        Given there is a celebrity Stephen King
        And I am logged in as an administrator

    @ui
    Scenario: Renaming the celebrity
        Given I want to modify the "Stephen King" celebrity
        When I rename it to Richard Bachman
        And I save my changes
        Then I should be notified that it has been successfully edited
        And I should see the celebrity Richard Bachman in the list
        But there should not be Stephen King celebrity anymore
