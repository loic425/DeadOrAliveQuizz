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

class Answer implements ResourceInterface
{
    const VALUE_YES = 'yes';
    const VALUE_NO = 'no';

    use IdentifiableTrait;

    /** @var string|null */
    private $value;

    /** @var int|null */
    private $bonusValue;

    /** @var Round|null */
    private $round;

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
}
