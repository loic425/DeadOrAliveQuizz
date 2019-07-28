<?php

namespace spec\App\Entity;

use App\Entity\Theme;
use Doctrine\Common\Collections\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

class ThemeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Theme::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_implements_translatable_interface(): void
    {
        $this->shouldImplement(TranslatableInterface::class);
    }

    function it_initializes_translation_collection_by_default(): void
    {
        $this->getTranslations()->shouldHaveType(Collection::class);
    }
}
