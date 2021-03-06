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

class DashboardPage extends SymfonyPage
{
    /**
     * {@inheritdoc}
     */
    public function getRouteName(): string
    {
        return 'sylius_frontend_account_dashboard';
    }

    /**
     * {@inheritdoc}
     */
    public function hasCustomerName($name): bool
    {
        return $this->hasValueInCustomerSection($name);
    }

    /**
     * {@inheritdoc}
     */
    public function hasCustomerEmail($email): bool
    {
        return $this->hasValueInCustomerSection($email);
    }

    /**
     * {@inheritdoc}
     */
    public function isVerified(): bool
    {
        return !$this->hasElement('verification');
    }

    /**
     * {@inheritdoc}
     */
    public function hasResendVerificationEmailButton(): bool
    {
        return $this->getDocument()->hasButton('Verify');
    }

    /**
     * {@inheritdoc}
     */
    public function pressResendVerificationEmail(): void
    {
        $this->getDocument()->pressButton('Verify');
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'customer' => '#customer-information',
            'verification' => '#verification-form',
        ]);
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    private function hasValueInCustomerSection($value): bool
    {
        $customerText = $this->getElement('customer')->getText();

        return false !== stripos($customerText, $value);
    }
}
