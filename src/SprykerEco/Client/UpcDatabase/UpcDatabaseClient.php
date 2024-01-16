<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Client\UpcDatabase;

use Generated\Shared\Transfer\UpcDatabaseRequestTransfer;
use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \SprykerEco\Client\UpcDatabase\UpcDatabaseFactory getFactory()
 */
class UpcDatabaseClient extends AbstractClient implements UpcDatabaseClientInterface
{
    /**
     * @inheridoc
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UpcDatabaseResponseTransfer
     */
    public function getProduct(UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer): UpcDatabaseResponseTransfer
    {
        return $this->getFactory()
            ->createApiClient()
            ->product($upcProductRequestTransfer);
    }
}
