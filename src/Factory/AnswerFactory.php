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

use App\Entity\Answer;
use App\Entity\CustomerInterface;
use App\Entity\Round;
use Sylius\Component\Resource\Factory\FactoryInterface;

class AnswerFactory implements FactoryInterface
{
    /** @var FactoryInterface */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNew(): Answer
    {
        /** @var Answer $answer */
        $answer = $this->factory->createNew();

        return $answer;
    }

    public function createForRoundWithCustomer(Round $round, CustomerInterface $customer): Answer
    {
        $answer = $this->createNew();
        $answer->setRound($round);

        return $answer;
    }
}
