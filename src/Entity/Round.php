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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

class Round implements ResourceInterface
{
    use IdentifiableTrait;

    /** @var GameSession */
    private $gameSession;

    /** @var Collection */
    private $scores;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }

    public function getGameSession(): GameSession
    {
        return $this->gameSession;
    }

    public function setGameSession(GameSession $gameSession): void
    {
        $this->gameSession = $gameSession;
    }
    
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function hasScore(RoundScore $score): bool
    {
        return $this->scores->contains($score);
    }

    public function addScore(RoundScore $score): void
    {
        $this->scores->add($score);
        $score->setRound($this);
    }
}
