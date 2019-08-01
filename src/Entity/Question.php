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
 * @ORM\Table(name="app_question")
 */
class Question implements ResourceInterface
{
    use IdentifiableTrait;

    /**
     * @var Round|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Round")
     */
    private $round;

    /**
     * @var Celebrity|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Celebrity")
     */
    private $celebrity;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $randomYears = [];

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): void
    {
        $this->round = $round;
    }

    public function getCelebrity(): ?Celebrity
    {
        return $this->celebrity;
    }

    public function setCelebrity(?Celebrity $celebrity): void
    {
        $this->celebrity = $celebrity;
    }

    public function getRandomYears(): array
    {
        return $this->randomYears;
    }

    public function hasRandomYear(int $randomYear): bool
    {
        return in_array($randomYear, $this->randomYears);
    }

    public function addRandomYear(int $randomYear): void
    {
        $this->randomYears[] = $randomYear;
    }
}
