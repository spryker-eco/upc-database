<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\UpcDatabase\Dependency\External;

interface UpcDatabaseToHttpResponseInterface
{
    /**
     * @return string
     */
    public function getResponseBody(): string;

    /**
     * @return array<string, mixed>
     */
    public function getHeaders(): array;

    /**
     * @param string $header
     *
     * @return string|null
     */
    public function getHeader(string $header): ?string;
}
