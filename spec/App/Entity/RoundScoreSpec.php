<?php

namespace spec\App\Entity;

use App\Entity\Player;
use App\Entity\Round;
use App\Entity\RoundScore;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;

class RoundScoreSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RoundScore::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function its_round_is_mutable(Round $round): void
    {
        $this->setRound($round);

        $this->getRound()->shouldReturn($round);
    }

    function its_player_is_mutable(Player $player): void
    {
        $this->setPlayer($player);

        $this->getPlayer()->shouldReturn($player);
    }

    function it_has_no_score_by_default(): void
    {
        $this->getScore()->shouldReturn(null);
    }

    function its_score_is_mutable(): void
    {
        $this->setScore(1);

        $this->getScore()->shouldReturn(1);
    }
}
