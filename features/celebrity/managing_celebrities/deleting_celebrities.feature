@managing_celebrities
Feature: Deleting an celebrity
    In order to get rid of deprecated celebrities
    As an Administrator
    I want to be able to delete celebrities

    Background:
        Given there is a celebrity Stephen King
        And I am logged in as an administrator

    @ui
    Scenario: Deleting an celebrity
        Given I want to browse celebrities
        When I delete celebrity Stephen King
        Then I should be notified that it has been successfully deleted
        And there should not be Stephen King celebrity anymore
