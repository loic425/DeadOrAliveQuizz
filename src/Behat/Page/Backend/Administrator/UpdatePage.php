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

namespace App\Behat\Page\Backend\Administrator;

use App\Behat\Page\Backend\Crud\UpdatePageInterface;
use App\Behat\Page\Backend\Crud\UpdatePage as BaseUpdatePage;

class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function changeUsername($username): void
    {
        $this->getElement('username')->setValue($username);
    }

    /**
     * {@inheritdoc}
     */
    public function changeEmail($email): void
    {
        $this->getElement('email')->setValue($email);
    }

    /**
     * {@inheritdoc}
     */
    public function changePassword($password): void
    {
        $this->getElement('password')->setValue($password);
    }

    /**
     * {@inheritdoc}
     */
    public function changeLocale($localeCode): void
    {
        $this->getElement('locale_code')->selectOption($localeCode);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'email' => '#sylius_admin_user_email',
            'enabled' => '#sylius_admin_user_enabled',
            'locale_code' => '#sylius_admin_user_localeCode',
            'password' => '#sylius_admin_user_plainPassword',
            'username' => '#sylius_admin_user_username',
        ]);
    }
}
