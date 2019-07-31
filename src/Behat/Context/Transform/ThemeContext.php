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

namespace App\Behat\Context\Transform;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webmozart\Assert\Assert;

class ThemeContext implements Context
{
    /** @var ThemeRepository */
    private $themeRepository;

    public function __construct(RepositoryInterface $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }
    /**
     * @Transform /^theme "([^"]+)"$/
     * @Transform :theme
     */
    public function getThemeByName(string $name): Theme
    {
        /** @var Theme[] $themes */
        $themes = $this->themeRepository->findByName($name, 'en_US');

        Assert::eq(
            count($themes),
            1,
            sprintf('%d taxons has been found with name "%s".', count($themes), $name)
        );

        return $themes[0];
    }
}
