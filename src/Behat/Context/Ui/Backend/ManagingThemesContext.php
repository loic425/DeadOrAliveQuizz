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

use App\Behat\Page\Backend\Theme\CreatePage;
use App\Behat\Page\Backend\Theme\IndexPage;
use App\Behat\Page\Backend\Theme\UpdatePage;
use App\Entity\Theme;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class ManagingThemesContext implements Context
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
     * @Given I want to create a new theme
     */
    public function iWantToCreateANewTheme()
    {
        $this->createPage->open();
    }

    /**
     * @When I browse themes
     * @When I want to browse themes
     */
    public function iWantToBrowseThemes()
    {
        $this->indexPage->open();
    }

    /**
     * @Given I want to modify the :theme theme
     */
    public function iWantToModifyTheTheme(Theme $theme)
    {
        $this->updatePage->open(['id' => $theme->getId()]);
    }

    /**
     * @When I name it :name in :language
     * @When I name it :name
     * @When I do not specify its name
     */
    public function iNameItIn(?string $name = null, $language = 'en_US')
    {
        $this->createPage->nameIt($name, $language);
    }

    /**
     * @When I rename it to :name
     */
    public function iChangeItsFirstnameAndLastNameAs(?string $name = null, $language = 'en_US')
    {
        $this->updatePage->nameIt($name, $language);
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
     * @When I delete theme :name
     */
    public function iDeleteThemeWithName(string $name): void
    {
        $this->indexPage->deleteResourceOnPage(['name' => $name]);
    }

    /**
     * @When I (also) check the :name theme
     */
    public function iCheckTheTheme(string $name): void
    {
        $this->indexPage->checkResourceOnPage(['name' => $name]);
    }

    /**
     * @When I delete them
     */
    public function iDeleteThem(): void
    {
        $this->indexPage->bulkDelete();
    }

    /**
     * @Then I should see a single theme in the list
     * @Then /^there should be (\d+) themes in the list$/
     */
    public function iShouldSeeThemesInTheList(int $number = 1): void
    {
        Assert::same($this->indexPage->countItems(), (int) $number);
    }

    /**
     * @Then I should (also )see the theme :name in the list
     * @Then the theme :name should appear in the website
     */
    public function theThemeShouldAppearInTheWebsite(string $name): void
    {
        $this->indexPage->open();
        Assert::true($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Then there should not be :name theme anymore
     */
    public function thereShouldBeNoAnymore(string $name)
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }
}
