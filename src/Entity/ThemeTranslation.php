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
use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_theme_translation")
 */
class ThemeTranslation extends AbstractTranslation implements ResourceInterface
{
    use IdentifiableTrait;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    protected $locale;

    /**
     * @var TranslatableInterface|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="translations")
     */
    protected $translatable;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    private $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
