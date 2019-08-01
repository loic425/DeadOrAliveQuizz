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

use Faker;

class YearGenerator
{
    /** @var Faker\Generator */
    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    public function generate(int $numberOfYears): iterable
    {
        for ($i = 0; $i < $numberOfYears; ++$i) {
            yield (int) $this->faker->unique()->year();
        }
    }
}
