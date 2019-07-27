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

namespace App\Behat\Page\Backend\Celebrity;

use App\Behat\Page\Backend\Crud\CreatePage as BaseCreatePage;

class CreatePage extends BaseCreatePage
{
    public function specifyFirstName(?string $firstName): void
    {
        $this->getElement('first_name')->setValue($firstName);
    }

    public function specifyLastName(?string $lastName): void
    {
        $this->getElement('last_name')->setValue($lastName);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'first_name' => '#app_celebrity_firstName',
            'last_name' => '#app_celebrity_lastName',
        ]);
    }
}
