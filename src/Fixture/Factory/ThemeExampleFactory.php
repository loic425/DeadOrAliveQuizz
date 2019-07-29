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

namespace App\Fixture\Factory;

use App\Entity\Theme;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThemeExampleFactory extends AbstractExampleFactory
{
    /** @var FactoryInterface */
    private $themeFactory;

    /** @var \Faker\Generator */
    private $faker;

    /** @var OptionsResolver */
    private $optionsResolver;

    public function __construct(FactoryInterface $themeFactory)
    {
        $this->themeFactory = $themeFactory;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var Theme $theme */
        $theme = $this->themeFactory->createNew();

        // add translation for each defined locales
        foreach ($this->getLocales() as $localeCode) {
            $this->createTranslation($theme, $localeCode, $options);
        }

        // create or replace with custom translations
        foreach ($options['translations'] as $localeCode => $translationOptions) {
            $this->createTranslation($theme, $localeCode, $translationOptions);
        }

        return $theme;
    }

    /**
     * @param Theme  $theme
     * @param string $localeCode
     * @param array  $options
     */
    private function createTranslation(Theme $theme, string $localeCode, array $options = []): void
    {
        $options = $this->optionsResolver->resolve($options);

        $theme->setCurrentLocale($localeCode);
        $theme->setFallbackLocale($localeCode);

        $theme->setName($options['name']);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('name', function (Options $options) {
                return ucfirst($this->faker->words(3, true));
            })

            ->setDefault('translations', [])
            ->setAllowedTypes('translations', ['array'])
            ->setDefault('children', [])
            ->setAllowedTypes('children', ['array'])
        ;
    }

    /**
     * @return iterable
     */
    private function getLocales(): iterable
    {
        yield 'fr_FR';
        yield 'en_US';
    }
}
