<?php

namespace spec\App\Generator;

use App\Entity\Question;
use App\Entity\Round;
use App\Factory\QuestionFactory;
use App\Generator\QuestionGenerator;
use App\Generator\YearGenerator;
use PhpSpec\ObjectBehavior;

class QuestionGeneratorSpec extends ObjectBehavior
{
    function let(QuestionFactory $questionFactory, YearGenerator $yearGenerator): void
    {
        $this->beConstructedWith($questionFactory, $yearGenerator);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(QuestionGenerator::class);
    }

    function it_generates_a_question(
        QuestionFactory $questionFactory,
        Round $round,
        Question $question,
        YearGenerator $yearGenerator
    ): void {
        $questionFactory->createForRound($round)->willReturn($question);
        $yearGenerator->generate(4)->willReturn([]);

        $this->generate($round)->shouldReturn($question);
    }

    function it_generates_a_question_with_four_random_years(
        QuestionFactory $questionFactory,
        Round $round,
        Question $question,
        YearGenerator $yearGenerator
    ): void {
        $questionFactory->createForRound($round)->willReturn($question);
        $yearGenerator->generate(4)->willReturn([2010, 2012, 2014, 2018]);

        $yearGenerator->generate(4)->shouldBeCalled();
        $question->addRandomYear(2010)->shouldBeCalled();
        $question->addRandomYear(2012)->shouldBeCalled();
        $question->addRandomYear(2014)->shouldBeCalled();
        $question->addRandomYear(2018)->shouldBeCalled();

        $this->generate($round);
    }
}
