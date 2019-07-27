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

use App\Behat\Page\Backend\Crud\UpdatePage as BaseUpdatePage;

class UpdatePage extends BaseUpdatePage
{
    public function changeFirstName(?string $firstName)
    {
        $this->getElement('first_name')->setValue($firstName);
    }

    public function changeLastName(?string $lastName)
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
