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

class GameSession implements ResourceInterface
{
    use IdentifiableTrait;

    /** @var \DateTimeInterface|null */
    private $startedAt;

    /** @var \DateTimeInterface|null */
    private $endedAt;

    /** @var Collection */
    private $rounds;

    public function __construct()
    {
        $this->rounds = new ArrayCollection();
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(?\DateTimeInterface $startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->endedAt;
    }

    public function setEndedAt(?\DateTimeInterface $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function hasRound(Round $round): bool
    {
        return $this->rounds->contains($round);
    }

    public function addRound(Round $round): void
    {
        $this->rounds->add($round);
        $round->setGameSession($this);
    }
}
