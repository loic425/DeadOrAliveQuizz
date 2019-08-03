<?php
/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Mobizel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Round;
use App\Generator\QuestionGenerator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

class GenerateQuestionSubscriber implements EventSubscriberInterface
{
    /** @var QuestionGenerator */
    private $questionGenerator;

    public function __construct(QuestionGenerator $questionGenerator)
    {
        $this->questionGenerator = $questionGenerator;
    }

    public static function getSubscribedEvents()
    {
        return [
            'app.round.pre_create' => 'generateQuestion',
        ];
    }

    public function generateQuestion(GenericEvent $event)
    {
        /** @var Round $round */
        $round = $event->getSubject();
        Assert::isInstanceOf($round, Round::class);

        $this->questionGenerator->generate($round);
    }
}
