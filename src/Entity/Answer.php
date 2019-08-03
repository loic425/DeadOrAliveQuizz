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

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_answer")
 */
class Answer implements ResourceInterface
{
    const VALUE_YES = 'yes';
    const VALUE_NO = 'no';

    use IdentifiableTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $value;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonusValue;

    /**
     * @var Round|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Round", inversedBy="answers")
     */
    private $round;

    /**
     * @var Player|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Player")
     */
    private $player;

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    public function getBonusValue(): ?int
    {
        return $this->bonusValue;
    }

    public function setBonusValue(?int $bonusValue): void
    {
        $this->bonusValue = $bonusValue;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): void
    {
        $this->round = $round;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): void
    {
        $this->player = $player;
    }
}
