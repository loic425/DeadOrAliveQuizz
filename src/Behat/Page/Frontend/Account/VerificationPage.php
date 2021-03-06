<?php

/*
 * This file is part of DeadOrAliveQuizz.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Behat\Page\Frontend\Account;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

class VerificationPage extends SymfonyPage
{
    /**
     * {@inheritdoc}
     */
    public function verifyAccount($token): void
    {
        $this->tryToOpen(['token' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteName(): string
    {
        return 'sylius_frontend_user_verification';
    }
}
