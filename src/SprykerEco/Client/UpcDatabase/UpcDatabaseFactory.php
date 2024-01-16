<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Client\UpcDatabase;

use Spryker\Client\Kernel\AbstractFactory;
use SprykerEco\Client\UpcDatabase\Api\UpcDatabaseApiClient;
use SprykerEco\Client\UpcDatabase\Api\UpcDatabaseApiClientInterface;
use SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpClientInterface;
use SprykerEco\Client\UpcDatabase\Dependency\Service\UpcDatabaseToUtilEncodingServiceInterface;
use SprykerEco\Client\UpcDatabase\Mapper\UpcDatabaseApiResponseMapper;
use SprykerEco\Client\UpcDatabase\Mapper\UpcDatabaseApiResponseMapperInterface;

/**
 * @method \SprykerEco\Client\UpcDatabase\UpcDatabaseConfig getConfig()
 */
class UpcDatabaseFactory extends AbstractFactory
{
    public function createUpcDatabaseApiClient(): UpcDatabaseApiClientInterface
    {
        return new UpcDatabaseApiClient(
            $this->getConfig(),
            $this->getHttpClient(),
            $this->createUpcDatabaseApiResponseMapper(),
        );
    }

    /**
     * @return UpcDatabaseApiResponseMapperInterface
     */
    public function createUpcDatabaseApiResponseMapper(): UpcDatabaseApiResponseMapperInterface
    {
        return new UpcDatabaseApiResponseMapper(
            $this->getUtilEncodingService(),
        );
    }

    /**
     * @return UpcDatabaseToHttpClientInterface
     */
    public function getHttpClient(): UpcDatabaseToHttpClientInterface
    {
        return $this->getProvidedDependency(UpcDatabaseDependencyProvider::CLIENT_HTTP);
    }

    /**
     * @return UpcDatabaseToHttpClientInterface
     */
    public function getUtilEncodingService(): UpcDatabaseToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(UpcDatabaseDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
