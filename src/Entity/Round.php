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
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_round")
 */
class Round implements ResourceInterface
{
    use IdentifiableTrait;

    /**
     * @var GameSession
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\GameSession", inversedBy="rounds")
     */
    private $gameSession;

    /**
     * @var Theme|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme")
     */
    private $theme;

    /**
     * @var Collection
     */
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

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): void
    {
        $this->theme = $theme;
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
