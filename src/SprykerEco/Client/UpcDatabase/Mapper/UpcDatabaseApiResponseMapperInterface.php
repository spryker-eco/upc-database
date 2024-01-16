<?php

namespace SprykerEco\Client\UpcDatabase\Mapper;

use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;
use SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface;

interface UpcDatabaseApiResponseMapperInterface
{
    /**
     * @param UpcDatabaseToHttpResponseInterface $httpResponse
     * @param UpcDatabaseResponseTransfer $upcDatabaseResponseTransfer
     *
     * @return UpcDatabaseResponseTransfer
     */
    public function mapHttpResponseToUpcDataBaseResponseTransfer(
        UpcDatabaseToHttpResponseInterface $httpResponse,
        UpcDatabaseResponseTransfer $upcDatabaseResponseTransfer
    ): UpcDatabaseResponseTransfer;
}
