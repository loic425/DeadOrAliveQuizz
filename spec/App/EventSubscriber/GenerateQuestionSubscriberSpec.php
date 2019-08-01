<?php

namespace spec\App\EventSubscriber;

use App\Entity\Round;
use App\EventSubscriber\GenerateQuestionSubscriber;
use App\Generator\QuestionGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class GenerateQuestionSubscriberSpec extends ObjectBehavior
{
    function let(QuestionGenerator $questionGenerator): void
    {
        $this->beConstructedWith($questionGenerator);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(GenerateQuestionSubscriber::class);
    }

    function it_is_a_subscriber(): void
    {
        $this->shouldImplement(EventSubscriberInterface::class);
    }

    function it_subscriber_to_events(): void
    {
        $this::getSubscribedEvents()->shouldReturn([
            'app.round.pre_create' => 'generateQuestion',
        ]);
    }

    function it_generates_a_question(
        GenericEvent $event,
        Round $round,
        QuestionGenerator $questionGenerator
    ): void {
        $event->getSubject()->willReturn($round);

        $questionGenerator->generate($round)->shouldBeCalled();

        $this->generateQuestion($event);
    }

    function it_throws_an_invalid_argument_exception_when_event_subject_is_not_round_type(
        GenericEvent $event,
        \stdClass $round
    ) {
        $event->getSubject()->willReturn($round);

        $this->shouldThrow(\InvalidArgumentException::class)->during('generateQuestion', [$event]);
    }
}
