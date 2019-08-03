<?php

namespace spec\App\Entity;

use App\Entity\Answer;
use App\Entity\Player;
use App\Entity\Round;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Model\ResourceInterface;

class AnswerSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(Answer::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_value_by_default(): void
    {
        $this->getValue()->shouldReturn(null);
    }

    function its_value_is_mutable(): void
    {
        $this->setValue(Answer::VALUE_YES);

        $this->getValue()->shouldReturn(Answer::VALUE_YES);
    }

    function it_has_no_bonus_value_by_default(): void
    {
        $this->getBonusValue()->shouldReturn(null);
    }

    function its_bonus_value_is_mutable(): void
    {
        $this->setBonusValue(2012);

        $this->getBonusValue()->shouldReturn(2012);
    }

    function it_has_no_round_by_default(): void
    {
        $this->getRound()->shouldReturn(null);
    }

    function its_round_is_mutable(Round $round): void
    {
        $this->setRound($round);

        $this->getRound()->shouldReturn($round);
    }

    function it_has_no_player_by_default(): void
    {
        $this->getPlayer()->shouldReturn(null);
    }

    function its_player_is_mutable(Player $player): void
    {
        $this->setPlayer($player);

        $this->getPlayer()->shouldReturn($player);
    }
}
