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

class RoundScore implements ResourceInterface
{
    use IdentifiableTrait;

    /** @var Round */
    private $round;

    /** @var Player */
    private $player;

    /** @var int|null */
    private $score;

    public function getRound(): Round
    {
        return $this->round;
    }

    public function setRound(Round $round): void
    {
        $this->round = $round;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function setPlayer(Player $player): void
    {
        $this->player = $player;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): void
    {
        $this->score = $score;
    }
}
