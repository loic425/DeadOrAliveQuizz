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

namespace App\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

class Round implements ResourceInterface
{
    use IdentifiableTrait;

    /** @var GameSession */
    private $gameSession;

    public function getGameSession(): GameSession
    {
        return $this->gameSession;
    }

    public function setGameSession(GameSession $gameSession): void
    {
        $this->gameSession = $gameSession;
    }
}
