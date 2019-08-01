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

namespace App\Tests\Controller\Theme;

use App\Entity\GameSession;
use App\Tests\Controller\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class ThemeListForGameSessionApiTest extends JsonApiTestCase
{
    /**
     * @test
     */
    public function it_lists_themes_for_a_game_session(): void
    {
        $resources = $this->loadFixturesFromFiles([
            'game_sessions.yaml',
            'themes.yaml',
        ]);

        /** @var GameSession $gameSession */
        $gameSession = $resources['game_session1'];

        $this->client->request('GET', $this->getGameSessionUrl($gameSession).'/themes');

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'theme/list_response', Response::HTTP_OK);
    }

    public function getGameSessionUrl(GameSession $gameSession): string
    {
        return '/api/game_sessions/'.$gameSession->getId();
    }
}
