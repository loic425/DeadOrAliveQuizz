<?php

namespace spec\App\Factory;

use App\Entity\CustomerInterface;
use App\Entity\GameSession;
use App\Entity\Player;
use App\Entity\Round;
use App\Factory\GameSessionFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

class GameSessionFactorySpec extends ObjectBehavior
{
    function let(
        FactoryInterface $factory,
        FactoryInterface $playerFactory
    ): void {
        $this->beConstructedWith($factory, $playerFactory);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(GameSessionFactory::class);
    }

    function it_implements_a_factory_interface(): void
    {
        $this->shouldHaveType(FactoryInterface::class);
    }

    function it_creates_game_sessions(FactoryInterface $factory, GameSession $gameSession): void
    {
        $factory->createNew()->willReturn($gameSession);

        $this->createNew()->shouldReturn($gameSession);
    }

    function it_creates_game_sessions_for_customer_with_challenged_customer(
        FactoryInterface $factory,
        GameSession $gameSession,
        CustomerInterface $customer,
        CustomerInterface $challengedCustomer,
        FactoryInterface $playerFactory,
        Player $player,
        Round $round
    ): void {
        $factory->createNew()->willReturn($gameSession);
        $playerFactory->createNew()->willReturn($player);

        $player->setCustomer($customer)->shouldBeCalled();
        $player->setCustomer($challengedCustomer)->shouldBeCalled();
        $gameSession->addPlayer($player)->shouldBeCalledTimes(2);

        $this->createForCustomerWithChallenger($customer, $challengedCustomer);
    }
}
