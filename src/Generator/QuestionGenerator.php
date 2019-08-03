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

namespace App\Generator;

use App\Entity\Question;
use App\Entity\Round;
use App\Factory\QuestionFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;

class QuestionGenerator
{
    /** @var QuestionFactory */
    private $questionFactory;

    /** @var CelebrityGenerator */
    private $celebrityGenerator;

    /** @var YearGenerator */
    private $yearGenerator;

    public function __construct(
        FactoryInterface $questionFactory,
        CelebrityGenerator $celebrityGenerator,
        YearGenerator $yearGenerator
    ) {
        $this->questionFactory = $questionFactory;
        $this->celebrityGenerator = $celebrityGenerator;
        $this->yearGenerator = $yearGenerator;
    }

    public function generate(Round $round): Question
    {
        /** @var Question $question */
        $question = $this->questionFactory->createForRound($round);
        $celebrity = $this->celebrityGenerator->generate($round);
        $question->setCelebrity($celebrity);

        $years = $this->yearGenerator->generate(4);
        foreach ($years as $year) {
            $question->addRandomYear($year);
        }

        return $question;
    }
}
