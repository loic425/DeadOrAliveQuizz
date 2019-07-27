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

namespace App\Fixture;

class CelebrityFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'app_celebrity';
    }
}