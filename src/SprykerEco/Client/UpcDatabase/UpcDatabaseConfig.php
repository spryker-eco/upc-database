<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace SprykerEco\Client\UpcDatabase;

use Spryker\Client\Kernel\AbstractBundleConfig;
use SprykerEco\Shared\UpcDatabase\UpcDatabaseConstants;

class UpcDatabaseConfig extends AbstractBundleConfig
{
    /**
     * Specification:
     * - Returns Upc API `Get product` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUpcDatabaseGetProductEndpoint(): string
    {
        return $this->get(UpcDatabaseConstants::GET_PRODUCT_ENDPOINT);

    }

    /**
     * Specification:
     * - Returns Upc API authorization key.
     *
     * @api
     *
     * @return string
     */
    public function getUpcDatabaseApiKey(): string
    {
        return $this->get(UpcDatabaseConstants::API_KEY);
    }
}
