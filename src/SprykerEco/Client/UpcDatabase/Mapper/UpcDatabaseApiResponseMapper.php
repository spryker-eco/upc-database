<?php

namespace SprykerEco\Client\UpcDatabase\Mapper;

use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;
use SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface;
use SprykerEco\Client\UpcDatabase\Dependency\Service\UpcDatabaseToUtilEncodingServiceInterface;

class UpcDatabaseApiResponseMapper implements UpcDatabaseApiResponseMapperInterface
{
    /**
     * @var UpcDatabaseToUtilEncodingServiceInterface
     */
    protected UpcDatabaseToUtilEncodingServiceInterface $utilEncodingService;

    public function __construct(
        UpcDatabaseToUtilEncodingServiceInterface $utilEncodingService
    )
    {
        $this->utilEncodingService = $utilEncodingService;
    }

    /**
     * @param UpcDatabaseToHttpResponseInterface $httpResponse
     * @param UpcDatabaseResponseTransfer $upcDatabaseResponseTransfer
     *
     * @return UpcDatabaseResponseTransfer
     */
    public function mapHttpResponseToUpcDataBaseResponseTransfer(
        UpcDatabaseToHttpResponseInterface $httpResponse,
        UpcDatabaseResponseTransfer        $upcDatabaseResponseTransfer
    ): UpcDatabaseResponseTransfer
    {
        $responseData = $this->utilEncodingService->decodeJson($httpResponse->getResponseBody(), true) ?? [];

        return $upcDatabaseResponseTransfer->fromArray($responseData, true);
    }
}
