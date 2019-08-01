<?php

namespace spec\App\Entity;

use App\Entity\Celebrity;
use App\Entity\Question;
use App\Entity\Round;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;

class QuestionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Question::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
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

    function it_has_no_celebrity_by_default(): void
    {
        $this->getCelebrity()->shouldReturn(null);
    }

    function its_celebrity_is_mutable(Celebrity $celebrity): void
    {
        $this->setCelebrity($celebrity);

        $this->getCelebrity()->shouldReturn($celebrity);
    }

    function it_has_no_random_years_by_default(): void
    {
        $this->getRandomYears()->shouldReturn([]);
    }

    function it_adds_random_years(): void
    {
        $this->addRandomYear(2012);

        $this->hasRandomYear(2012)->shouldReturn(true);
    }
}
