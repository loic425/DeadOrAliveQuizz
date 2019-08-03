<?php

namespace spec\App\Factory;

use App\Entity\Answer;
use App\Entity\CustomerInterface;
use App\Entity\GameSession;
use App\Entity\Player;
use App\Entity\Round;
use App\Factory\AnswerFactory;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Factory\FactoryInterface;

class AnswerFactorySpec extends ObjectBehavior
{
    function let(FactoryInterface $factory): void
    {
        $this->beConstructedWith($factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AnswerFactory::class);
    }

    function it_implements_a_factory_interface(): void
    {
        $this->shouldHaveType(FactoryInterface::class);
    }

    function it_creates_an_answer(FactoryInterface $factory, Answer $answer): void
    {
        $factory->createNew()->willReturn($answer);

        $this->createNew()->shouldReturn($answer);
    }

    function it_creates_an_answer_for_a_round_with_customer(
        FactoryInterface $factory,
        Answer $answer,
        Round $round,
        CustomerInterface $firstCustomer,
        CustomerInterface $secondCustomer,
        GameSession $gameSession,
        Player $firstPlayer,
        Player $secondPlayer
    ): void {
        $factory->createNew()->willReturn($answer);
        $round->getGameSession()->willReturn($gameSession);
        $gameSession->getPlayers()->willReturn(new ArrayCollection([
            $firstPlayer->getWrappedObject(),
            $secondPlayer->getWrappedObject(),
        ]));
        $firstPlayer->getCustomer()->willReturn($firstCustomer);
        $secondPlayer->getCustomer()->willReturn($secondCustomer);

        $answer->setRound($round)->shouldBeCalled();
        $answer->setPlayer($firstPlayer)->shouldBeCalled();

        $this->createForRoundWithCustomer($round, $firstCustomer)->shouldReturn($answer);
    }
}
