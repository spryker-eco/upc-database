<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\UpcDatabase\Dependency\External;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use SprykerEco\Client\UpcDatabase\Exception\UpcDatabaseToHttpClientException;

class UpcDatabaseToGuzzleHttpClientAdapter implements UpcDatabaseToHttpClientInterface
{
    /**
     * @var int
     */
    protected const DEFAULT_TIMEOUT = 40;

    /**
     * @var string
     */
    protected const HEADER_CONTENT_TYPE_KEY = 'Content-Type';

    /**
     * @var string
     */
    protected const HEADER_CONTENT_TYPE_VALUE = 'application/json';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleHttpClient;

    public function __construct()
    {
        $this->guzzleHttpClient = new Client([
            RequestOptions::TIMEOUT => static::DEFAULT_TIMEOUT,
            RequestOptions::HEADERS => [
                static::HEADER_CONTENT_TYPE_KEY => static::HEADER_CONTENT_TYPE_VALUE,
            ],
        ]);
    }

    /**
     * @param string $url
     * @param string $method
     * @param string $body
     * @param string $authKey
     *
     * @return \SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface
     *
     * @throws \SprykerEco\Client\UpcDatabase\Exception\UpcDatabaseToHttpClientException
     *
     */
    public function sendRequest(string $url, string $method, string $body, string $authKey): UpcDatabaseToHttpResponseInterface
    {
        $options = [
            RequestOptions::BODY => $body,
            RequestOptions::AUTH => ['Bearer', $authKey],
        ];

        try {
            $response = $this->guzzleHttpClient->request($method, $url, $options);
        } catch (RequestException $requestException) {
            throw new UpcDatabaseToHttpClientException(
                $this->createUpcDatabaseGuzzleResponse($requestException->getResponse()),
                $requestException->getMessage(),
                (int)$requestException->getCode(),
                $requestException,
            );
        }

        return $this->createUpcDatabaseGuzzleResponse($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \SprykerEco\Client\UpcDatabase\Dependency\External\UpcDatabaseToHttpResponseInterface
     */
    protected function createUpcDatabaseGuzzleResponse(?ResponseInterface $response = null): UpcDatabaseToHttpResponseInterface
    {
        return new UpcDatabaseToGuzzleResponseAdapter(
            $response ? $response->getBody() : null,
            $response ? $response->getHeaders() : [],
        );
    }
}
