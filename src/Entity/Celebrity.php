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
 * @ORM\Table(name="app_celebrity")
 */
class Celebrity implements ResourceInterface
{
    use IdentifiableTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    private $lastName;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
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
