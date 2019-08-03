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

namespace App\Factory;

use App\Entity\Question;
use App\Entity\Round;
use Sylius\Component\Resource\Factory\FactoryInterface;

class QuestionFactory implements FactoryInterface
{
    /** @var FactoryInterface */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNew(): Question
    {
        /** @var Question $question */
        $question = $this->factory->createNew();

        return $question;
    }

    public function createForRound(Round $round): Question
    {
        $question = $this->createNew();
        $round->setQuestion($question);

        return $question;
    }
}
