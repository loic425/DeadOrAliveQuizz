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
use Doctrine\ORM\PersistentCollection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_theme")
 */
class Theme implements ResourceInterface, TranslatableInterface
{
    use IdentifiableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @var ArrayCollection|PersistentCollection|TranslationInterface[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ThemeTranslation", mappedBy="translatable", cascade={"persist"})
     */
    protected $translations;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    public function getName(): ?string
    {
        return $this->getTranslation()->getName();
    }

    public function setName(?string $name)
    {
        $this->getTranslation()->setName($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): TranslationInterface
    {
        return new ThemeTranslation();
    }
}
