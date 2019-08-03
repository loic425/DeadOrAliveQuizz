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
use JMS\Serializer\Annotation as Serializer;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_celebrity")
 *
 * @Serializer\ExclusionPolicy("all")
 */
class Celebrity implements ResourceInterface
{
    use IdentifiableTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     *
     * @Serializer\Expose
     * @Serializer\Groups({"Default", "Detailed"})
     *
     * @Assert\NotBlank
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     *
     * @Serializer\Expose
     * @Serializer\Groups({"Default", "Detailed"})
     *
     * @Assert\NotBlank
     */
    private $lastName;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadAt;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme")
     */
    private $themes;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

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

    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function hasTheme(Theme $theme): bool
    {
        return $this->themes->contains($theme);
    }

    public function addTheme(Theme $theme): void
    {
        $this->themes->add($theme);
    }

    public function removeTheme(Theme $theme): void
    {
        $this->themes->removeElement($theme);
    }
}
