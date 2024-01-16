<?php

namespace SprykerEco\Client\UpcDatabase\Api;

use Generated\Shared\Transfer\UpcDatabaseRequestTransfer;
use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;
use SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpClientInterface;
use SprykerEco\Client\UpcDatabase\Mapper\UpcDatabaseApiResponseMapperInterface;
use SprykerEco\Client\UpcDatabase\UpcDatabaseConfig;
use Symfony\Component\HttpFoundation\Request;

class UpcDatabaseApiClient implements UpcDatabaseApiClientInterface
{
    /**
     * @var UpcDatabaseConfig
     */
    protected UpcDatabaseConfig $upcDatabaseConfig;

    /**
     * @var UpcDatabaseToHttpClientInterface
     */
    protected UpcDatabaseToHttpClientInterface $httpClient;

    /**
     * @var UpcDatabaseApiResponseMapperInterface
     */
    protected UpcDatabaseApiResponseMapperInterface $upcDatabaseApiResponseMapper;

    /**
     * @param UpcDatabaseConfig $upcDatabaseConfig
     * @param UpcDatabaseToHttpClientInterface $httpClient
     * @param UpcDatabaseApiResponseMapperInterface $upcDatabaseApiResponseMapper
     */
    public function __construct(
        UpcDatabaseConfig  $upcDatabaseConfig,
        UpcDatabaseToHttpClientInterface $httpClient,
        UpcDatabaseApiResponseMapperInterface $upcDatabaseApiResponseMapper

    )
    {
        $this->upcDatabaseConfig = $upcDatabaseConfig;
        $this->httpClient = $httpClient;
        $this->upcDatabaseApiResponseMapper = $upcDatabaseApiResponseMapper;
    }

    /**
     * @param UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer
     *
     * @return UpcDatabaseResponseTransfer
     */
    public function getProduct(UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer): UpcDatabaseResponseTransfer
    {
        $response = $this->httpClient
            ->sendRequest(
                sprintf('%s%s', $this->upcDatabaseConfig->getUpcDatabaseGetProductEndpoint(), $upcDatabaseRequestTransfer->getUpcNumberOrFail()),
                Request::METHOD_GET,
                '',
                $this->upcDatabaseConfig->getUpcDatabaseApiKey(),
            );



        return $this->upcDatabaseApiResponseMapper
            ->mapHttpResponseToUpcDataBaseResponseTransfer(
                $response,
                new UpcDatabaseResponseTransfer(),
            );
    }
}
