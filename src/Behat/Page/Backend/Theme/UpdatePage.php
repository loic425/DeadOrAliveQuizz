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

namespace App\Behat\Page\Backend\Theme;

use App\Behat\Page\Backend\Crud\UpdatePage as BaseUpdatePage;

class UpdatePage extends BaseUpdatePage
{
    public function nameIt(?string $name, string $languageCode): void
    {
        $this->getElement('name', ['%language%' => $languageCode])->setValue($name);
    }

    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'name' => '#app_theme_translations_%language%_name',
        ]);
    }
}
