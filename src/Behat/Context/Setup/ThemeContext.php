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

namespace App\Behat\Context\Setup;

use App\Behat\Service\SharedStorageInterface;
use App\Entity\Celebrity;
use App\Entity\Theme;
use App\Fixture\Factory\CelebrityExampleFactory;
use App\Fixture\Factory\ThemeExampleFactory;
use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class ThemeContext implements Context
{
    /** @var ThemeExampleFactory */
    private $themeFactory;

    /** @var RepositoryInterface */
    private $themeRepository;

    /** @var SharedStorageInterface */
    private $sharedStorage;

    public function __construct(ThemeExampleFactory $themeFactory, RepositoryInterface $themeRepository, SharedStorageInterface $sharedStorage)
    {
        $this->themeFactory = $themeFactory;
        $this->themeRepository = $themeRepository;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Given there is (also )a theme :name
     */
    public function thereIsThemeWithName(string $name): void
    {
        $this->createTheme([
            'name' => $name,
        ]);
    }

    private function createTheme(array $options): Theme
    {
        $theme = $this->themeFactory->create($options);
        $this->themeRepository->add($theme);
        $this->sharedStorage->set('theme', $theme);

        return $theme;
    }
}
