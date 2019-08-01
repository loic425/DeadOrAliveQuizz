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

namespace App\Factory;

use App\Entity\GameSession;
use App\Entity\Round;
use Sylius\Component\Resource\Factory\FactoryInterface;

class RoundFactory implements FactoryInterface
{
    /** @var FactoryInterface */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNew(): Round
    {
        /** @var Round $round */
        $round = $this->factory->createNew();

        return $round;
    }

    public function createForGameSession(GameSession $gameSession)
    {
        $round = $this->createNew();
        $gameSession->addRound($round);

        return $round;
    }
}
