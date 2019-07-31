<?php

namespace spec\App\Factory;

use App\Entity\GameSession;
use App\Entity\Round;
use App\Factory\RoundFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

class RoundFactorySpec extends ObjectBehavior
{
    function let(FactoryInterface $factory): void
    {
        $this->beConstructedWith($factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RoundFactory::class);
    }

    function it_implements_a_factory_interface(): void
    {
        $this->shouldHaveType(FactoryInterface::class);
    }

    function it_creates_rounds(FactoryInterface $factory, Round $round): void
    {
        $factory->createNew()->willReturn($round);

        $this->createNew()->shouldReturn($round);
    }

    function it_creates_rounds_for_a_game_session(
        FactoryInterface $factory,
        GameSession $gameSession,
        Round $round
    ): void {
        $factory->createNew()->willReturn($round);

        $gameSession->addRound($round)->shouldBeCalled();

        $this->createForGameSession($gameSession);
    }
}
