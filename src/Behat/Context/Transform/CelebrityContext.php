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

use App\Entity\Celebrity;
use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webmozart\Assert\Assert;

class CelebrityContext implements Context
{
    /** @var RepositoryInterface */
    private $celebrityRepository;

    public function __construct(RepositoryInterface $celebrityRepository)
    {
        $this->celebrityRepository = $celebrityRepository;
    }
    /**
     * @Transform /^celebrity "([^"]+)"$/
     * @Transform :celebrity
     */
    public function getCelebrityByFullName(string $fullName): Celebrity
    {
        [$firstName, $lastName] = explode(' ', $fullName);

        /** @var Celebrity $celebrity */
        $celebrity = $this->celebrityRepository->findOneBy([
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);

        Assert::notNull(
            $celebrity,
            sprintf('Celebrity with first name "%s" and last name %s does not exist', $firstName, $lastName)
        );

        return $celebrity;
    }
}
