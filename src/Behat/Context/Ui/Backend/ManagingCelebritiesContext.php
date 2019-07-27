<?php
/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Mobizel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Behat\Context\Ui\Backend;

use App\Behat\Page\Backend\Celebrity\CreatePage;
use App\Behat\Page\Backend\Celebrity\IndexPage;
use App\Behat\Page\Backend\Celebrity\UpdatePage;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class ManagingCelebritiesContext implements Context
{
    /** @var CreatePage */
    private $createPage;

    /** @var IndexPage */
    private $indexPage;

    /** @var UpdatePage */
    private $updatePage;

    public function __construct(CreatePage $createPage, IndexPage $indexPage, UpdatePage $updatePage)
    {
        $this->createPage = $createPage;
        $this->indexPage = $indexPage;
        $this->updatePage = $updatePage;
    }

    /**
     * @Given I want to create a new celebrity
     */
    public function iWantToCreateANewCelebrity()
    {
        $this->createPage->open();
    }

    /**
     * @When I browse celebrities
     * @When I want to browse celebrities
     */
    public function iWantToBrowseCelebrities()
    {
        $this->indexPage->open();
    }

    /**
     * @Given I want to modify the :article celebrity
     */
    public function iWantToModifyAnArticle(Article $article)
    {
        $this->updatePage->open(['id' => $article->getId()]);
    }

    /**
     * @When I specify its first name as :firstName
     * @When I do not specify its first name
     */
    public function iSpecifyItsFirstNameAs($firstName = null)
    {
        $this->createPage->specifyFirstName($firstName);
    }

    /**
     * @When I specify its last name as :firstName
     * @When I do not specify its last name
     */
    public function iSpecifyItsLastNameAs($firstName = null)
    {
        $this->createPage->specifyLastName($firstName);
    }

    /**
     * @When I rename it to :firstName :lastName
     */
    public function iChangeItsFirstnameAndLastNameAs(string $firstName, string $lastName)
    {
        $this->updatePage->specifyFirstName($firstName);
        $this->updatePage->specifyLastName($lastName);
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
     * @When I delete celebrity :firstName :lastName
     */
    public function iDeleteCelebrityWithFirstNameAndLastName(string $firstName, string $lastName): void
    {
        $this->indexPage->deleteResourceOnPage(['firstName' => $firstName, 'lastName' => $lastName]);
    }

    /**
     * @When I (also) check the :firstName :lastName article
     */
    public function iCheckTheCelebrity(string $firstName, string $lastName): void
    {
        $this->indexPage->checkResourceOnPage(['firstName' => $firstName, 'lastName' => $lastName]);
    }

    /**
     * @When I delete them
     */
    public function iDeleteThem(): void
    {
        $this->indexPage->bulkDelete();
    }

    /**
     * @Then I should see a single celebrity in the list
     * @Then /^there should be (\d+) celebrities in the list$/
     */
    public function iShouldSeeCelebritiesInTheList(int $number = 1): void
    {
        Assert::same($this->indexPage->countItems(), (int) $number);
    }

    /**
     * @Then I should (also )see the celebrity :firstName :lastName in the list
     * @Then the celebrity :firstName :lastName should appear in the website
     */
    public function theCelebrityShouldAppearInTheWebsite(string $firstName, string $lastName): void
    {
        $this->indexPage->open();
        Assert::true($this->indexPage->isSingleResourceOnPage(['firstName' => $firstName, 'lastName' => $lastName]));
    }

    /**
     * @Then there should not be :firstName :lastName celebrity anymore
     */
    public function thereShouldBeNoAnymore(string $firstName, string $lastName)
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['firstName' => $firstName, 'lastName' => $lastName]));
    }

    /**
     * @Then I should be notified that the first name is required
     */
    public function iShouldBeNotifiedThatFirstNameIsRequired()
    {
        Assert::same($this->createPage->getValidationMessage('firstName'), 'This value should not be blank.');
    }

    /**
     * @Then this celebrity should not be added
     */
    public function thisCelebrityShouldNotBeAdded()
    {
        $this->indexPage->open();
        Assert::same($this->indexPage->countItems(), 0);
    }
}
