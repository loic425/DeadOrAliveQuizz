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
use App\Entity\Round;
use App\Entity\Theme;
use App\Tests\AuthorizedHeaderTrait;
use App\Tests\Controller\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class AnswerCreateApiTest extends JsonApiTestCase
{
    use AuthorizedHeaderTrait;

    /**
     * @test
     */
    public function it_creates_answers_for_a_round(): void
    {
        $resources = $this->loadFixturesFromFiles([
            'authentication/api_user.yaml',
            'game_sessions.yaml',
            'rounds.yaml',
        ]);

        /** @var Round $round */
        $round = $resources['round1'];

        $data = <<<EOM
            {
                "value": "yes",
                "bonusValue": 2012
            }
EOM;

        $this->client->request('POST', $this->getRoundUrl($round).'/answers', [], [], static::$authorizedHeaderWithContentType, $data);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'answer/create_response', Response::HTTP_CREATED);
    }

    public function getRoundUrl(Round $round): string
    {
        return '/api/rounds/'.$round->getId();
    }
}
