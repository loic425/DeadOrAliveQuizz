<?php

/*
 * This file is part of mz_149_s_fertitest.
 *
 * (c) Mobizel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Tests\Controller\Customer;

use App\Tests\Controller\JsonApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class LoginApiTest extends JsonApiTestCase
{
    /**
     * @test
     */
    public function it_allows_to_login()
    {
        $this->loadFixturesFromFile('authentication/api_user.yaml');

        $data = <<<EOM
            {
                "username": "api@sylius.com",
                "password": "sylius"
            }
EOM;

        $this->client->request('POST', '/api/login', [], [], [
            'ACCEPT' => 'application/json',
            'CONTENT_TYPE' => 'application/json',
        ], $data);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'security/login_response', Response::HTTP_OK);
    }
}
