<?php

namespace spec\App\Entity;

use App\Entity\Celebrity;
use App\Entity\Theme;
use Doctrine\Common\Collections\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Model\ResourceInterface;

class CelebritySpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(Celebrity::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldHaveType(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_first_name_by_default(): void
    {
        $this->getFirstName()->shouldReturn(null);
    }

    function its_first_name_is_mutable(): void
    {
        $this->setFirstName('Stephen');

        $this->getFirstName()->shouldReturn('Stephen');
    }

    function it_has_no_last_name_by_default(): void
    {
        $this->getLastName()->shouldReturn(null);
    }

    function its_last_name_is_mutable(): void
    {
        $this->setLastName('King');

        $this->getLastName()->shouldReturn('King');
    }

    function it_has_no_death_date_by_default(): void
    {
        $this->getDeadAt()->shouldReturn(null);
    }

    function its_death_date_is_mutable(\DateTimeImmutable $deadAt): void
    {
        $this->setDeadAt($deadAt);

        $this->getDeadAt()->shouldReturn($deadAt);
    }

    function it_is_no_dead_by_default(): void
    {
        $this->isDead()->shouldReturn(false);
    }

    function it_can_pass_away(\DateTimeImmutable $deadAt): void
    {
        $this->setDeadAt($deadAt);

        $this->isDead()->shouldReturn(true);
    }

    function it_initializes_theme_collection_by_default(): void
    {
        $this->getThemes()->shouldHaveType(Collection::class);
    }

    function it_adds_themes(Theme $theme): void
    {
        $this->addTheme($theme);

        $this->hasTheme($theme)->shouldReturn(true);
    }

    function it_removes_themes(Theme $theme): void
    {
        $this->addTheme($theme);

        $this->removeTheme($theme);

        $this->hasTheme($theme)->shouldReturn(false);
    }
}
