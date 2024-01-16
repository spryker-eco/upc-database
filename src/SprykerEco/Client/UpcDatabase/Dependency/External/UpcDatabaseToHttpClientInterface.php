<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\UpcDatabase\Dependency\External;

interface UpcDatabaseToHttpClientInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param string $body
     * @param string $authKey
     *
     * @return \SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface
     */
    public function sendRequest(string $url, string $method, string $body, string $authKey): UpcDatabaseToHttpResponseInterface;
}
