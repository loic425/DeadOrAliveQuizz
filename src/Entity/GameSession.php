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
 * @ORM\Table(name="app_game_session")
 */
class GameSession implements ResourceInterface
{
    use IdentifiableTrait;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startedAt;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endedAt;

    /**
     * @var CustomerInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Sylius\Component\Customer\Model\CustomerInterface")
     */
    private $author;

    /**
     * @var CustomerInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Sylius\Component\Customer\Model\CustomerInterface")
     */
    private $challengedCustomer;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Player", mappedBy="gameSession", cascade={"persist"})
     */
    private $players;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Round", mappedBy="gameSession")
     */
    private $rounds;

    public function __construct()
    {
        $this->rounds = new ArrayCollection();
        $this->players = new ArrayCollection();
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

    public function getAuthor(): ?CustomerInterface
    {
        return $this->author;
    }

    public function setAuthor(?CustomerInterface $author): void
    {
        $this->author = $author;
    }

    public function getChallengedCustomer(): ?CustomerInterface
    {
        return $this->challengedCustomer;
    }

    public function setChallengedCustomer(?CustomerInterface $challengedCustomer): void
    {
        $this->challengedCustomer = $challengedCustomer;
    }

    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function hasPlayer(Player $player): bool
    {
        return $this->players->contains($player);
    }

    public function addPlayer(Player $player): void
    {
        $this->players->add($player);
        $player->setGameSession($this);
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
