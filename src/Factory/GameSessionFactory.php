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

use App\Entity\CustomerInterface;
use App\Entity\GameSession;
use App\Entity\Player;
use App\Entity\Round;
use App\Entity\RoundScore;
use Sylius\Component\Resource\Factory\FactoryInterface;

class GameSessionFactory implements FactoryInterface
{
    /** @var FactoryInterface */
    private $factory;

    /** @var FactoryInterface */
    private $playerFactory;

    public function __construct(
        FactoryInterface $factory,
        FactoryInterface $playerFactory
    ) {
        $this->factory = $factory;
        $this->playerFactory = $playerFactory;
    }

    public function createNew(): GameSession
    {
        /** @var GameSession $gameSession */
        $gameSession = $this->factory->createNew();

        return $gameSession;
    }

    public function createForCustomerWithChallenger(
        CustomerInterface $customer,
        CustomerInterface $challengedCustomer
    ): GameSession {
        $gameSession = $this->createNew();
        $players = $this->createPlayers([$customer, $challengedCustomer]);

        foreach ($players as $player) {
            $gameSession->addPlayer($player);
        }

        return $gameSession;
    }

    private function createPlayers(array $customers): iterable
    {
        foreach ($customers as $customer) {
            /** @var Player $firstPlayer */
            $player = $this->playerFactory->createNew();
            $player->setCustomer($customer);

            yield $player;
        }
    }
}
