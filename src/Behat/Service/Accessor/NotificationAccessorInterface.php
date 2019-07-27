<?php

/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Behat\Service\Accessor;

use App\Behat\NotificationType;

interface NotificationAccessorInterface
{
    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return NotificationType
     */
    public function getType();
}
