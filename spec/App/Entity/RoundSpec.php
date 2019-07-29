<?php

namespace spec\App\Entity;

use App\Entity\GameSession;
use App\Entity\Round;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Model\ResourceInterface;

class RoundSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Round::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function its_game_session_is_mutable(GameSession $gameSession): void
    {
        $this->setGameSession($gameSession);

        $this->getGameSession()->shouldReturn($gameSession);
    }
}
