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

use App\Entity\Celebrity;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CelebrityExampleFactory extends AbstractExampleFactory
{
    /** @var FactoryInterface */
    private $celebrityFactory;

    /** @var \Faker\Generator */
    private $faker;

    /** @var OptionsResolver */
    private $optionsResolver;

    public function __construct(FactoryInterface $celebrityFactory)
    {
        $this->celebrityFactory = $celebrityFactory;

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

        /** @var Celebrity $celebrity */
        $celebrity = $this->celebrityFactory->createNew();
        $celebrity->setFirstName($options['first_name']);
        $celebrity->setLastName($options['last_name']);
        $celebrity->setDeadAt($options['dead_at']);

        return $celebrity;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('first_name', function (Options $options): string {
                return $this->faker->firstName;
            })
            ->setDefault('last_name', function (Options $options): string {
                return $this->faker->lastName;
            })
            ->setDefault('dead_at', function (Options $options): ?\DateTimeInterface {
                $deadAt = $this->faker->dateTimeBetween();

                return $this->faker->boolean() ? $deadAt : null;
            })
        ;
    }
}
