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

namespace App\Provider;

use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\Translation\Provider\TranslationLocaleProviderInterface;

final class TranslationLocaleProvider implements TranslationLocaleProviderInterface
{
    /** @var RepositoryInterface */
    private $localeRepository;

    /** @var string */
    private $defaultLocaleCode;

    public function __construct(RepositoryInterface $localeRepository, string $defaultLocaleCode)
    {
        $this->localeRepository = $localeRepository;
        $this->defaultLocaleCode = $defaultLocaleCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefinedLocalesCodes(): array
    {
        /** @var array|LocaleInterface[] $locales */
        $locales = $this->localeRepository->findAll();

        /** @var array $localesCodes */
        $localesCodes = array_map(
            function (LocaleInterface $locale): ?string {
                return $locale->getCode();
            },
            $locales
        );

        return $localesCodes;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultLocaleCode(): string
    {
        return $this->defaultLocaleCode;
    }
}
