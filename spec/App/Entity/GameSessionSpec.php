<?php

namespace spec\App\Entity;

use App\Entity\CustomerInterface;
use App\Entity\GameSession;
use App\Entity\Player;
use App\Entity\Round;
use Doctrine\Common\Collections\Collection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;

class GameSessionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GameSession::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_started_date_by_default(): void
    {
        $this->getStartedAt()->shouldReturn(null);
    }

    function its_started_date_is_mutable(\DateTimeImmutable $startedAt): void
    {
        $this->setStartedAt($startedAt);

        $this->getStartedAt()->shouldReturn($startedAt);
    }

    function it_has_no_ended_date_by_default(): void
    {
        $this->getEndedAt()->shouldReturn(null);
    }

    function its_ended_date_is_mutable(\DateTimeImmutable $endedAt): void
    {
        $this->setEndedAt($endedAt);

        $this->getEndedAt()->shouldReturn($endedAt);
    }

    function it_has_no_author_by_default(): void
    {
        $this->getAuthor()->shouldReturn(null);
    }

    function its_author_is_mutable(CustomerInterface $author): void
    {
        $this->setAuthor($author);

        $this->getAuthor()->shouldReturn($author);
    }

    function it_has_no_challenged_customer_by_default(): void
    {
        $this->getChallengedCustomer()->shouldReturn(null);
    }

    function its_challenged_customer_is_mutable(CustomerInterface $challengedCustomer): void
    {
        $this->setChallengedCustomer($challengedCustomer);

        $this->getChallengedCustomer()->shouldReturn($challengedCustomer);
    }

    function it_initializes_player_collection_by_default(): void
    {
        $this->getPlayers()->shouldHaveType(Collection::class);
    }

    function it_initializes_round_collection_by_default(): void
    {
        $this->getRounds()->shouldHaveType(Collection::class);
    }

    function it_adds_players(Player $player): void
    {
        $player->setGameSession($this)->shouldBeCalled();

        $this->addPlayer($player);
        $this->hasPlayer($player)->shouldReturn(true);
    }

    function it_adds_rounds(Round $round): void
    {
        $round->setGameSession($this)->shouldBeCalled();

        $this->addRound($round);
        $this->hasRound($round)->shouldReturn(true);
    }
}
