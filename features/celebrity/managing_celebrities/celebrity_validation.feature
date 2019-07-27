@managing_celebrities
Feature: celebrities validation
    In order to avoid making mistakes when managing celebrities
    As an Administrator
    I want to be prevented from adding it without specifying required fields

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Trying to add a new celebrity without title
        Given I want to create a new celebrity
        When I do not specify its first name
        And I try to add it
        Then I should be notified that the first name is required
        And this celebrity should not be added
