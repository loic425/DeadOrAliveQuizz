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
use App\Fixture\Factory\CelebrityExampleFactory;
use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class CelebrityContext implements Context
{
    /** @var CelebrityExampleFactory */
    private $celebrityFactory;

    /** @var RepositoryInterface */
    private $celebrityRepository;

    /** @var SharedStorageInterface */
    private $sharedStorage;

    public function __construct(CelebrityExampleFactory $celebrityFactory, RepositoryInterface $celebrityRepository, SharedStorageInterface $sharedStorage)
    {
        $this->celebrityFactory = $celebrityFactory;
        $this->celebrityRepository = $celebrityRepository;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Given there is (also )a celebrity :firstName :lastName
     */
    public function thereIsCustomerWithNameAndEmail($firstName, $lastName): void
    {
        $this->createCelebrity([
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);
    }

    private function createCelebrity(array $options): Celebrity
    {
        $celebrity = $this->celebrityFactory->create($options);
        $this->celebrityRepository->add($celebrity);
        $this->sharedStorage->set('celebrity', $celebrity);

        return $celebrity;
    }
}
