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

namespace App\Tests\Controller\GameSession;

use App\Entity\AppUserInterface;
use App\Tests\Controller\JsonApiTestCase;

class GameSessionCreateApiTest extends JsonApiTestCase
{
    /**
     * @test
     */
    public function it_creates_game_session(): void
    {
        $resources = $this->loadFixturesFromFiles([
            'authentication/api_user',
            'users.yaml',
        ]);

        $user = $resources['challenged_user'];

        $this->client->request('POST', $this->getUserUrl($user).'/game-sessions/', [], []);
    }

    private function getUserUrl(AppUserInterface $user): string
    {
        return '/api/users/'.$user->getEmailCanonical();
    }
}
