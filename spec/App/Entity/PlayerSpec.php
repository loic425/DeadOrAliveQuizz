<?php

namespace spec\App\Entity;

use App\Entity\CustomerInterface;
use App\Entity\GameSession;
use App\Entity\Player;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_customer_by_default(): void
    {
        $this->getCustomer()->shouldReturn(null);
    }

    function its_customer_is_mutable(CustomerInterface $customer): void
    {
        $this->setCustomer($customer);

        $this->getCustomer()->shouldReturn($customer);
    }

    function it_has_no_game_session_by_default(): void
    {
        $this->getGameSession()->shouldReturn(null);
    }

    function its_game_session_is_mutable(GameSession $gameSession): void
    {
        $this->setGameSession($gameSession);

        $this->getGameSession()->shouldReturn($gameSession);
    }

    function it_has_no_score_by_default(): void
    {
        $this->getScore()->shouldReturn(null);
    }

    function its_score_is_mutable(): void
    {
        $this->setScore(42);

        $this->getScore()->shouldReturn(42);
    }
}
