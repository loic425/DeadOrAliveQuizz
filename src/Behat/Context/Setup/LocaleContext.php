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
use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Component\Locale\Converter\LocaleConverterInterface;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class LocaleContext implements Context
{
    /** @var SharedStorageInterface */
    private $sharedStorage;

    /** @var FactoryInterface */
    private $localeFactory;

    /** @var RepositoryInterface */
    private $localeRepository;

    /** @var ObjectManager */
    private $localeManager;

    /** @var LocaleConverterInterface */
    private $localeConverter;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        LocaleConverterInterface $localeConverter,
        FactoryInterface $localeFactory,
        RepositoryInterface $localeRepository,
        ObjectManager $localeManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->localeConverter = $localeConverter;
        $this->localeFactory = $localeFactory;
        $this->localeRepository = $localeRepository;
        $this->localeManager = $localeManager;
    }

    /**
     * @Given the website has locale :localeCode
     * @Given the website is( also) available in :localeCode
     * @Given the locale :localeCode is enabled
     */
    public function theWebsiteHasLocale($localeCode)
    {
        $locale = $this->provideLocale($localeCode);

        $this->saveLocale($locale);
    }

    /**
     * @Given the locale :localeCode does not exist in the website
     */
    public function theWebsiteDoesNotHaveLocale($localeCode)
    {
        /** @var LocaleInterface $locale */
        $locale = $this->localeRepository->findOneBy(['code' => $localeCode]);
        if (null !== $locale) {
            $this->localeRepository->remove($locale);
        }
    }

    /**
     * @param string $localeCode
     *
     * @return LocaleInterface
     */
    private function createLocale($localeCode)
    {
        /** @var LocaleInterface $locale */
        $locale = $this->localeFactory->createNew();
        $locale->setCode($localeCode);

        return $locale;
    }

    /**
     * @param string $localeCode
     *
     * @return LocaleInterface
     */
    private function provideLocale($localeCode)
    {
        $locale = $this->localeRepository->findOneBy(['code' => $localeCode]);
        if (null === $locale) {
            /** @var LocaleInterface $locale */
            $locale = $this->createLocale($localeCode);

            $this->localeRepository->add($locale);
        }

        return $locale;
    }

    private function saveLocale(LocaleInterface $locale)
    {
        $this->sharedStorage->set('locale', $locale);
        $this->localeRepository->add($locale);
    }
}
