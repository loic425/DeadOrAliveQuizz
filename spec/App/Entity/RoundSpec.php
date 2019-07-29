<?php

namespace spec\App\Entity;

use App\Entity\GameSession;
use App\Entity\Round;
use App\Entity\RoundScore;
use Doctrine\Common\Collections\Collection;
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

    function it_initializes_score_collection_by_default(): void
    {
        $this->getScores()->shouldHaveType(Collection::class);
    }

    function it_adds_scores(RoundScore $score): void
    {
        $score->setRound($this)->shouldBeCalled();

        $this->addScore($score);

        $this->hasScore($score)->shouldReturn(true);
    }
}
