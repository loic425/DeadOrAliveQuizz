<?php

namespace spec\App\Factory;

use App\Entity\Question;
use App\Entity\Round;
use App\Factory\QuestionFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

class QuestionFactorySpec extends ObjectBehavior
{
    function let(FactoryInterface $factory): void
    {
        $this->beConstructedWith($factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(QuestionFactory::class);
    }

    function it_implements_a_factory_interface(): void
    {
        $this->shouldHaveType(FactoryInterface::class);
    }

    function it_creates_a_question(FactoryInterface $factory, Question $question): void
    {
        $factory->createNew()->willReturn($question);

        $this->createNew()->shouldReturn($question);
    }

    function it_creates_a_question_for_a_round(
        FactoryInterface $factory,
        Question $question,
        Round $round
    ): void {
        $factory->createNew()->willReturn($question);

        $round->setQuestion($question)->shouldBeCalled();

        $this->createForRound($round);
    }
}
