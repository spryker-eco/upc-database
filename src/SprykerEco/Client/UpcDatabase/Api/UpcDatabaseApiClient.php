<?php

namespace SprykerEco\Client\UpcDatabase\Api;

use Generated\Shared\Transfer\UpcDatabaseRequestTransfer;
use Generated\Shared\Transfer\UpcDatabaseResponseTransfer;
use SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpClientInterface;
use SprykerEco\Client\UpcDatabase\UpcDatabaseConfig;

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
     * @param UpcDatabaseConfig $upcDatabaseConfig
     * @param UpcDatabaseToHttpClientInterface $httpClient
     */
    public function __construct(
        UpcDatabaseConfig  $upcDatabaseConfig,
        UpcDatabaseToHttpClientInterface $httpClient,


    )
    {
        $this->upcDatabaseConfig = $upcDatabaseConfig;
        $this->httpClient = $httpClient;
    }

    public function getProduct(UpcDatabaseRequestTransfer $upcDatabaseRequestTransfer): UpcDatabaseResponseTransfer
    {



        return new UpcDatabaseResponseTransfer();
    }
}
