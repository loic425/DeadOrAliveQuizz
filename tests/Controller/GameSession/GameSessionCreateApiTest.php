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
use App\Tests\AuthorizedHeaderTrait;
use App\Tests\Controller\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class GameSessionCreateApiTest extends JsonApiTestCase
{
    use AuthorizedHeaderTrait;

    /**
     * @test
     */
    public function it_creates_game_session(): void
    {
        $resources = $this->loadFixturesFromFiles([
            'authentication/api_user.yaml',
            'users.yaml',
        ]);

        $user = $resources['challenged_user'];

        $this->client->request('POST', $this->getUserUrl($user).'/game_sessions', [], [], self::$authorizedHeaderWithContentType);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'game_session/create_response', Response::HTTP_CREATED);
    }

    private function getUserUrl(AppUserInterface $user): string
    {
        return '/api/users/'.$user->getUsernameCanonical();
    }
}
