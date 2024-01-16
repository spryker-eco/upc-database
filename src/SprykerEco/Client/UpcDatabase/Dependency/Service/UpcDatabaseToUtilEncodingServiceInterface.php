<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\UpcDatabase\Dependency\Service;

interface UpcDatabaseToUtilEncodingServiceInterface
{
    /**
     * @param string $jsonValue
     * @param bool $assoc
     * @param int|null $depth
     * @param int|null $options
     *
     * @return mixed|null
     */
    public function decodeJson(string $jsonValue, bool $assoc = false, ?int $depth = null, ?int $options = null);
}
