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

namespace App\Tests\Controller\Round;

use App\Entity\GameSession;
use App\Entity\Theme;
use App\Tests\AuthorizedHeaderTrait;
use App\Tests\Controller\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class RoundCreateApiTest extends JsonApiTestCase
{
    use AuthorizedHeaderTrait;

    /**
     * @test
     */
    public function it_creates_rounds_for_a_game_session(): void
    {
        $resources = $this->loadFixturesFromFiles([
            'authentication/api_user.yaml',
            'game_sessions.yaml',
            'themes.yaml',
        ]);

        /** @var GameSession $gameSession */
        $gameSession = $resources['game_session1'];
        /** @var Theme $theme */
        $theme = $resources['theme_Cinema'];

        $data = <<<EOM
            {
                "theme": %s
            }
EOM;
        $data = sprintf($data, $theme->getId());

        $this->client->request('POST', $this->getGameSessionUrl($gameSession).'/rounds', [], [], static::$authorizedHeaderWithContentType, $data);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'round/create_response', Response::HTTP_CREATED);
    }

    public function getGameSessionUrl(GameSession $gameSession): string
    {
        return '/api/game_sessions/'.$gameSession->getId();
    }
}
