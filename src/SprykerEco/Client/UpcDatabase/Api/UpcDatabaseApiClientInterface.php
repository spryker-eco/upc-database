<?php

namespace SprykerEco\Client\UpcDatabase\Api;

use Generated\Shared\Transfer\UpcDatabaseRequestTransfer;
use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;

interface UpcDatabaseApiClientInterface
{
    /**
     * @param UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer
     *
     * @return UpcDatabaseResponseTransfer
     */
    public function getProduct(UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer): UpcDatabaseResponseTransfer;
}
