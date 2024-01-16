<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Client\UpcDatabase;


use Generated\Shared\Transfer\UpcDatabaseRequestTransfer;
use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;

interface UpcDatabaseClientInterface
{
    /**
     * Specification:
     * - Requires `UpcDatabaseRequestTransfer.upcNumber` to be set.
     * - Queries UPC database API for product information.
     * - Throws `UpcDatabaseToHttpClientException` in case of HTTP errors.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UpcDatabaseResponseTransfer
     */
    public function getProduct(UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer): UpcDatabaseResponseTransfer;
}
