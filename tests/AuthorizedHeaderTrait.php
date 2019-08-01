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

namespace App\Tests;

trait AuthorizedHeaderTrait
{
    /** @var array */
    private static $authorizedHeaderWithContentType = [
        'HTTP_Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTY1NDU5MTAsImV4cCI6MTg3MTkwNTkxMCwicm9sZXMiOlsiUk9MRV9BUElfQUNDRVNTIl0sInVzZXJuYW1lIjoic3lsaXVzIn0.J3mJpIQQlKuptD3CMhY_PTMxejGqRCE1C19G85QRHhcibkqyDrNhnPT5GabMb4CyXQEQtrW-vFZVRcW04wFvpjBNFEM3HQJAJ-kXzb2eJJuEvjX47Bp2Z0INuAdeXjHnG46ZEP75q_7wJTyzx4QYZkIOh-8bJ9864AGZ9zFhF8Y8irEPuIS64YcjrLo59yAT-xzM-qwmiqFcRPJv50vToWeDIWB9wnSLsgehRyTzMt29cUbVQbn-iqi3FfF7WI415cIGqwP6Zw5xaSjH9fkf9R6cfsYQtkxZrkg2hXYe16kErSxgCWMayUZjKWEDA-64VlcCKe67BDVUgqmcVIjwfaj0CLI5d5CA1Eb3lsvMYxySEcjK1tiel1UwaBzgQXF0wXx80YB9nEZ8GF308Dn8yDvoHpmzBzjdTO82PVmfdBU5Qsn_n936GAkV9rZFe_wgkxnfolEOYXl3TgGVtOvYMRLAwxq5NdtJKr8B-ICa6E_VUgB040ZbO0-fA3vBVKXQec4YawzuiMBsnC9bTTbEUuWF4kE8sIDiKmJvCxDiQW_KVpPdljIsjcYo5_rFH67EF9o1b80GHq3Ggw6J9-8OmJoN07z9dqtACVNZOdqz0rcWlKUUMqrtFOr8hpuwNsy_kcp7Aeq6jIixbclFI7T1OWX4EM4jjru9VWjQgzmDu_E',
        'CONTENT_TYPE' => 'application/json',
    ];

    /** @var array */
    private static $authorizedHeaderWithAccept = [
        'HTTP_Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTY1NDU5MTAsImV4cCI6MTg3MTkwNTkxMCwicm9sZXMiOlsiUk9MRV9BUElfQUNDRVNTIl0sInVzZXJuYW1lIjoic3lsaXVzIn0.J3mJpIQQlKuptD3CMhY_PTMxejGqRCE1C19G85QRHhcibkqyDrNhnPT5GabMb4CyXQEQtrW-vFZVRcW04wFvpjBNFEM3HQJAJ-kXzb2eJJuEvjX47Bp2Z0INuAdeXjHnG46ZEP75q_7wJTyzx4QYZkIOh-8bJ9864AGZ9zFhF8Y8irEPuIS64YcjrLo59yAT-xzM-qwmiqFcRPJv50vToWeDIWB9wnSLsgehRyTzMt29cUbVQbn-iqi3FfF7WI415cIGqwP6Zw5xaSjH9fkf9R6cfsYQtkxZrkg2hXYe16kErSxgCWMayUZjKWEDA-64VlcCKe67BDVUgqmcVIjwfaj0CLI5d5CA1Eb3lsvMYxySEcjK1tiel1UwaBzgQXF0wXx80YB9nEZ8GF308Dn8yDvoHpmzBzjdTO82PVmfdBU5Qsn_n936GAkV9rZFe_wgkxnfolEOYXl3TgGVtOvYMRLAwxq5NdtJKr8B-ICa6E_VUgB040ZbO0-fA3vBVKXQec4YawzuiMBsnC9bTTbEUuWF4kE8sIDiKmJvCxDiQW_KVpPdljIsjcYo5_rFH67EF9o1b80GHq3Ggw6J9-8OmJoN07z9dqtACVNZOdqz0rcWlKUUMqrtFOr8hpuwNsy_kcp7Aeq6jIixbclFI7T1OWX4EM4jjru9VWjQgzmDu_E',
        'ACCEPT' => 'application/json',
    ];
}
