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

namespace App\Generator;

use App\Entity\Celebrity;
use App\Entity\Round;
use App\Repository\CelebrityRepository;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class CelebrityGenerator
{
    /** @var CelebrityRepository */
    private $celebrityRepository;

    public function __construct(RepositoryInterface $celebrityRepository)
    {
        $this->celebrityRepository = $celebrityRepository;
    }

    public function generate(Round $round): Celebrity
    {
        return $this->celebrityRepository->findRandomOneForRound($round);
    }
}
