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

class Celebrity implements ResourceInterface
{
    use IdentifiableTrait;

    /** @var string|null */
    private $firstName;

    /** @var string|null */
    private $lastName;

    /** @var \DateTimeInterface|null */
    private $deadAt;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getDeadAt(): ?\DateTimeInterface
    {
        return $this->deadAt;
    }

    public function setDeadAt(?\DateTimeInterface $deadAt): void
    {
        $this->deadAt = $deadAt;
    }

    public function isDead(): bool
    {
        return null !== $this->deadAt;
    }
}
