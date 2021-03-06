<?php

/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Behat\Context\Ui\Backend;

use App\Behat\NotificationType;
use App\Behat\Page\Backend\Administrator\CreatePage;
use App\Behat\Page\Backend\Administrator\UpdatePage;
use App\Behat\Page\Backend\Administrator\IndexPage;
use App\Behat\Service\NotificationCheckerInterface;
use App\Entity\AdminUser;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

final class ManagingAdministratorsContext implements Context
{
    /**
     * @var CreatePage
     */
    private $createPage;

    /**
     * @var IndexPage
     */
    private $indexPage;

    /**
     * @var UpdatePage
     */
    private $updatePage;

    /**
     * @var NotificationCheckerInterface
     */
    private $notificationChecker;

    /**
     * @param CreatePage                   $createPage
     * @param IndexPage                    $indexPage
     * @param UpdatePage                   $updatePage
     * @param NotificationCheckerInterface $notificationChecker
     */
    public function __construct(
        CreatePage $createPage,
        IndexPage $indexPage,
        UpdatePage $updatePage,
        NotificationCheckerInterface $notificationChecker
    ) {
        $this->createPage = $createPage;
        $this->indexPage = $indexPage;
        $this->updatePage = $updatePage;
        $this->notificationChecker = $notificationChecker;
    }

    /**
     * @Given I want to create a new administrator
     */
    public function iWantToCreateANewAdministrator(): void
    {
        $this->createPage->open();
    }

    /**
     * @Given /^I am editing (my) details$/
     *
     * @When /^I want to edit (this administrator)$/
     */
    public function iWantToEditThisAdministrator(AdminUser $adminUser): void
    {
        $this->updatePage->open(['id' => $adminUser->getId()]);
    }

    /**
     * @When I browse administrators
     * @When I want to browse administrators
     */
    public function iWantToBrowseAdministrators(): void
    {
        $this->indexPage->open();
    }

    /**
     * @When I specify its name as :username
     * @When I do not specify its name
     */
    public function iSpecifyItsNameAs($username = null): void
    {
        $this->createPage->specifyUsername($username);
    }

    /**
     * @When I change its name to :username
     */
    public function iChangeItsNameTo($username): void
    {
        $this->updatePage->changeUsername($username);
    }

    /**
     * @When I specify its email as :email
     * @When I do not specify its email
     */
    public function iSpecifyItsEmailAs($email = null): void
    {
        $this->createPage->specifyEmail($email);
    }

    /**
     * @When I change its email to :email
     */
    public function iChangeItsEmailTo($email): void
    {
        $this->updatePage->changeEmail($email);
    }

    /**
     * @When I specify its password as :password
     * @When I do not specify its password
     */
    public function iSpecifyItsPasswordAs($password = null): void
    {
        $this->createPage->specifyPassword($password);
    }

    /**
     * @When I change its password to :password
     */
    public function iChangeItsPasswordTo($password): void
    {
        $this->updatePage->changePassword($password);
    }

    /**
     * @When I enable it
     */
    public function iEnableIt(): void
    {
        $this->createPage->enable();
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt(): void
    {
        $this->createPage->create();
    }

    /**
     * @When I save my changes
     */
    public function iSaveMyChanges(): void
    {
        $this->updatePage->saveChanges();
    }

    /**
     * @When I delete administrator with email :email
     */
    public function iDeleteAdministratorWithEmail($email): void
    {
        $this->indexPage->deleteResourceOnPage(['email' => $email]);
    }

    /**
     * @When I check (also) the :email administrator
     */
    public function iCheckTheAdministrator(string $email): void
    {
        $this->indexPage->checkResourceOnPage(['email' => $email]);
    }

    /**
     * @When I delete them
     */
    public function iDeleteThem(): void
    {
        $this->indexPage->bulkDelete();
    }

    /**
     * @Then the administrator :email should appear in the store
     * @Then I should see the administrator :email in the list
     * @Then there should still be only one administrator with an email :email
     */
    public function theAdministratorShouldAppearInTheStore($email): void
    {
        $this->indexPage->open();

        Assert::true($this->indexPage->isSingleResourceOnPage(['email' => $email]));
    }

    /**
     * @Then this administrator with name :username should appear in the store
     * @Then there should still be only one administrator with name :username
     */
    public function thisAdministratorWithNameShouldAppearInTheStore($username): void
    {
        $this->indexPage->open();

        Assert::true($this->indexPage->isSingleResourceOnPage(['username' => $username]));
    }

    /**
     * @Then I should see a single administrator in the list
     * @Then /^there should be (\d+) administrators in the list$/
     */
    public function iShouldSeeAdministratorsInTheList(int $number = 1): void
    {
        Assert::same($this->indexPage->countItems(), (int) $number);
    }

    /**
     * @Then I should be notified that email must be unique
     */
    public function iShouldBeNotifiedThatEmailMustBeUnique(): void
    {
        Assert::same($this->createPage->getValidationMessage('email'), 'This email is already used.');
    }

    /**
     * @Then I should be notified that name must be unique
     */
    public function iShouldBeNotifiedThatNameMustBeUnique(): void
    {
        Assert::same($this->createPage->getValidationMessage('name'), 'This username is already used.');
    }

    /**
     * @Then I should be notified that the :elementName is required
     */
    public function iShouldBeNotifiedThatFirstNameIsRequired($elementName): void
    {
        Assert::same($this->createPage->getValidationMessage($elementName), sprintf('Please enter your %s.', $elementName));
    }

    /**
     * @Then I should be notified that this email is not valid
     */
    public function iShouldBeNotifiedThatEmailIsNotValid(): void
    {
        Assert::same($this->createPage->getValidationMessage('email'), 'This email is invalid.');
    }

    /**
     * @Then this administrator should not be added
     */
    public function thisAdministratorShouldNotBeAdded(): void
    {
        $this->indexPage->open();

        Assert::same($this->indexPage->countItems(), 1);
    }

    /**
     * @Then there should not be :email administrator anymore
     */
    public function thereShouldBeNoAnymore($email): void
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['email' => $email]));
    }

    /**
     * @Then I should be notified that it cannot be deleted
     */
    public function iShouldBeNotifiedThatItCannotBeDeleted(): void
    {
        $this->notificationChecker->checkNotification(
            'Cannot remove currently logged in user.',
            NotificationType::failure()
        );
    }
}
