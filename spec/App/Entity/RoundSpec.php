<?php

namespace spec\App\Entity;

use App\Entity\Answer;
use App\Entity\GameSession;
use App\Entity\Question;
use App\Entity\Round;
use App\Entity\RoundScore;
use App\Entity\Theme;
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

    function it_has_no_theme_by_default(): void
    {
        $this->getTheme()->shouldReturn(null);
    }

    function its_theme_is_mutable(Theme $theme): void
    {
        $this->setTheme($theme);

        $this->getTheme()->shouldReturn($theme);
    }

    function it_has_no_question_by_default(): void
    {
        $this->getQuestion()->shouldReturn(null);
    }

    function its_question_is_mutable(Question $question): void
    {
        $this->setQuestion($question);

        $this->getQuestion()->shouldReturn($question);
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

    function it_initializes_answer_collection_by_default(): void
    {
        $this->getAnswers()->shouldHaveType(Collection::class);
    }

    function it_adds_answers(Answer $answer): void
    {
        $answer->setRound($this)->shouldBeCalled();

        $this->addAnswer($answer);

        $this->hasAnswer($answer)->shouldReturn(true);
    }
}
